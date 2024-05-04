<script setup>
// Import necessary components from Vue
import {computed, ref, watch} from "vue";
import spinningOverLay from "@/components/spinning-overlay/SpinningOverLay.vue";
import axios from "axios";
// Define props
const props = defineProps({
    routeList: {
        type: Object,
        required: true
    },
    permisstionList: {
        type: Object,
        required: true
    }
});
// Create a ref to track loading state
const spinning = ref(false);
const isRouteListLoaded = ref(false);
// Data property to track the state of "Select All" checkbox
const selectAll = ref(false);
// Define the data property to store selected routes
const selectedRoutesName = ref([]);
const roleName = ref('');
const roleId = ref('');
// Check if permissionList exists and is not null or undefined
// Define custom events
const  emit  = defineEmits(['updateRoleList']);
// Function to emit the custom event
const emitUpdateRoleList = () => {
  emit('updateRoleList');
};
// Watch for changes to routeList
watch(() => props.routeList, (newValue, oldValue) => {
    // Set isRouteListLoaded to true when routeList changes
    isRouteListLoaded.value = true;
}, { immediate: true });

// Watch for changes to permisstionList
watch(() => props.permisstionList, (newValue, oldValue) => {
    // Ensure permissions is an array before iterating
    if (!Array.isArray(newValue.permissions)) {
        return; // Return if permissions is not an array
    }
    roleName.value = newValue.name
    roleId.value = newValue.id
    // Update selectedRoutesName based on permissions
    const selectedRoutes = newValue.permissions.flatMap(permission => {
        // Find routes with matching names in filteredRouteList
        return filteredRouteList.value.flatMap(routeGroup =>
            routeGroup.routes.filter(route => route.name === permission.name)
        );
    });

    // Extract route names from selectedRoutes
    const selectedRouteNames = selectedRoutes.map(route => route.name);

    // Update selectedRoutesName
    selectedRoutesName.value = selectedRouteNames;

    // Check if all routes are selected
    const allRoutesSelected = filteredRouteList.value.every(routeGroup =>
        routeGroup.routes.every(route => selectedRouteNames.includes(route.name))
    );

    // Update selectAll checkbox based on allRoutesSelected
    selectAll.value = allRoutesSelected;
});


// Define computed property for filtered route list
const filteredRouteList = computed(() => {
    if (!isRouteListLoaded.value) {
        // If routeList is not loaded, return an empty array
        return [];
    }
    // Convert object to array of objects
    const routeArray = Object.entries(props.routeList).map(([key, value]) => ({
        prefix: key,
        routes: value
    }));
    // Filter out the prefixes you want to skip
    return routeArray.filter(routeGroup => routeGroup.prefix !== 'sanctum' && routeGroup.prefix !== '_ignition');
});
// Method to handle "Select All" checkbox
const selectAllRoutes = () => {
    if (selectAll.value) {
        // If "Select All" is checked, set all routes as selected
        selectedRoutesName.value = filteredRouteList.value.flatMap(routeGroup => routeGroup.routes.map(route => route.name));
    } else {
        // If "Select All" is unchecked, clear all selected routes
        selectedRoutesName.value = [];
    }
};
// Method to handle form submission
const submitForm = () => {
    const rolePermissions = {
        id: roleId.value,
        name: roleName.value,
        permissions: selectedRoutesName.value,
    }
    spinning.value=true;
    axios.post('/admin/roles/update',rolePermissions).then(res=>{
        if (res.data.message) {
            toastr.success(res.data.message);
            closeModal();
            emitUpdateRoleList();
        } else if (res.data.error) {
            toastr.error(res.data.error);
        }
    }).catch(error=>{
        console.log(error)
        toastr.error(error.response.data.error);
    }).finally(()=>{
        spinning.value=false;
    })
};
// Method to close the modal and reset form
const closeModal = () => {
    const updateModalClose = document.getElementById('updateModalClose')
    updateModalClose.click()
    // Reset form
    roleId.value = '';
    roleName.value = '';
    selectedRoutesName.value = [];
    selectAll.value = false;
};
</script>

<template>
    <div class="modal fade" id="updateRoleModal" tabindex="-1" aria-hidden="true">
        <spinningOverLay :spinner="spinning"/>
        <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" id="updateModalClose" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Update Role</h3>
                        <p class="text-muted">Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form class="row g-3" @submit.prevent="submitForm">
                        <div class="col-12 mb-4">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" required v-model="roleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
                        </div>
                        <div class="col-12">
                            <h5>Role Permissions</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-medium">Administrator Access <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                                        <td>
                                            <div class="form-check">
                                                <input @change="selectAllRoutes" v-model="selectAll"  class="form-check-input" type="checkbox" id="selectAll" />
                                                <label class="form-check-label" :for="selectAll">
                                                    Select All
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr v-for="(routeGroup, index) in filteredRouteList" :key="index">
                                        <td class="text-nowrap fw-medium">{{ routeGroup.prefix }}</td>
                                        <td >
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5" v-for="(route, routeIndex) in routeGroup.routes" :key="routeIndex">
                                                    <input v-model="selectedRoutesName" :value="route.name" class="form-check-input" type="checkbox" :id="'route_' + index + '_' + routeIndex" />
                                                    <label class="form-check-label" :for="'route_' + index + '_' + routeIndex">
                                                        {{ route.name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
