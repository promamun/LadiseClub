<script setup>
import avatar1 from '../../avatars/avatar-1.png'
import avatar2 from '../../avatars/avatar-2.png'
import avatar3 from '../../avatars/avatar-3.png'
import avatar4 from '../../avatars/avatar-4.png'
import avatar5 from '../../avatars/avatar-5.png'
import girlUsingMobile from '../../avatars/girl-using-mobile.png'
import {ref, onMounted} from "vue";
import ModalAddRoles from "./modals/ModalAddRoles.vue";
import ModalUpdateRoles from "@/components/roles/modals/ModalUpdateRoles.vue";
import SpinningOverLay from "@/components/spinning-overlay/SpinningOverLay.vue";
import axios from "axios";

// Create a reactive variable to store the user list
const permission = ref([]);
const routeList = ref([]);
const roleList = ref([]);
const spinning = ref(false);
// Axios request to fetch user list
const fetchRouteList = async () => {
    try {
        const response = await axios.get('/admin/all-routes'); // Replace '/api/users' with your actual API endpoint
        // Update userList with the fetched data
        routeList.value = response.data.data;
    } catch (error) {
        console.error('Error fetching rote list:', error);
    }
}
const fetchRoleList = async () => {
    try {
        const response = await axios.get('/admin/roles/data'); // Replace '/api/users' with your actual API endpoint
        // Update userList with the fetched data
        roleList.value = response.data.data;
    } catch (error) {
        console.error('Error fetching Role list:', error);
    }
}
const deleteRole = async function(id) {
    try {
        spinning.value = true;
        // User confirmed, proceed with the deletion
        alert('Are you Sure')
        axios.get('/admin/roles/delete/' + id).then(res => {
            if (res.data.message){
                toastr.success(res.data.message)
                fetchRoleList();
            }
        }).catch(error => {
            console.log(error)
        }).finally(()=>{
            spinning.value=false
        })
    } catch (error) {
        console.error('Error fetching Role list:', error);
    }
}
// Fetch user list when component is mounted
onMounted(() => {
    fetchRouteList();
    fetchRoleList();
});
const sendRolesData = async (id) => {
    try {
        const response = await axios.get('/admin/roles/permissions/'+id);
        permission.value = response.data.data;
    } catch (error) {
        console.error('Error fetching rote list:', error);
    }
}
</script>

<template>
    <spinningOverLay :spinner="spinning"/>
    <h4 class="mb-4">Roles List</h4>
    <p class="mb-4">A role provided access to predefined menus and features so that depending on assigned role an administrator can have access to what user needs.</p>
    <!-- Role cards -->
    <div class="row g-4">
        <div v-for="(roles, index) in roleList" :key="index" class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div  class="d-flex justify-content-between">
                        <h6 class="fw-normal mb-2">Total 4 users</h6>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" :src="avatar1" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" :src="avatar2" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Julee Rossignol" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" :src="avatar3" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" :src="avatar4" alt="Avatar">
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" :src="avatar5" alt="Avatar">
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1">
                        <div class="role-heading">
                            <h4 class="mb-1">{{ roles.name }}</h4>
                            <a href="javascript:;" @click="sendRolesData(roles.id)" data-bs-toggle="modal" data-bs-target="#updateRoleModal" class="role-edit-modal"><span>Edit Role</span></a>
                        </div>
                        <a href="javascript:void(0);" @click="deleteRole(roles.id)" class="text-muted"><i class="ti ti-trash ti-md text-danger"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img :src="girlUsingMobile" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">Add New Role</button>
                            <p class="mb-0 mt-1">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ModalAddRoles @updateRoleList="fetchRoleList" :routeList="routeList" />
    <ModalUpdateRoles @updateRoleList="fetchRoleList" :permisstionList="permission" :routeList="routeList" />
</template>
