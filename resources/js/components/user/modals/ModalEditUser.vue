<script setup>
import {onMounted, ref, watch} from "vue";
import spinningOverLay from "@/components/spinning-overlay/SpinningOverLay.vue";
import axios from "axios";

const props = defineProps({
  userDetails: {
    type: Object,
    required: true
  }
});
// Create a ref to track loading state
const spinning = ref(false);
const userRole = ref([]);
const user_id = ref('');
const name = ref('');
const email = ref('');
const password = ref('');
const role_id = ref('');
const hasError = ref(false);
const errorMessage = ref('');

// Define custom events
const  emit  = defineEmits(['updateUserList']);

// Function to emit the custom event
const emitUpdateUserList = () => {
  emit('updateUserList');
};
const roleList = async () => {
  try {
    const response = await axios.get('/admin/user-role-list');
    userRole.value = response.data;
  } catch (error) {
    console.error('Error fetching role list:', error);
  }
};
const submitForm = () => {
    const user = {
        id: user_id.value,
        name: name.value,
        email: email.value,
        password: password.value,
        role_id: role_id.value,
    }
    spinning.value=true;
    axios.post('/admin/user/update',user).then(res=>{
        if (res.data.success) {
            toastr.success(res.data.success);
            closeModal();
            emitUpdateUserList();
        } else if (res.data.error) {
            toastr.error(res.data.error);
            hasError.value = true
            errorMessage.value = res.data.error;
        }
    }).catch(error=>{
        console.log(error)
        if (error.response.data.message){
          hasError.value = true
          errorMessage.value = error.response.data.message;
          toastr.error(error.response.data.message);
        }else if (error.response.data.error){
          hasError.value = true
          errorMessage.value = error.response.data.error;
          toastr.error(error.response.data.error);
        }
    }).finally(()=>{
        spinning.value=false;
    })
};
// Method to close the modal and reset form
const closeModal = () => {
    const addModalClose = document.getElementById('ModalUserEditClose')
    addModalClose.click()
    // Reset form
    name.value = '';
    email.value = '';
    password.value = '';
    role_id.value = '';
    hasError.value = false;
};
const modalClose = () => {
    // Reset form
    props.userDetails= {};
    password.value = '';
    hasError.value = false;
    errorMessage.value = '';
};
onMounted(()=>{
  roleList();
});
watch(() => props.userDetails, (newValue, oldValue) => {
  // Set isRouteListLoaded to true when routeList changes
  name.value = newValue.name
  email.value = newValue.email
  user_id.value = newValue.id
  // Update selected role_id based on user's roles
  newValue.role_users.forEach(userRoleName => {
    console.log(userRoleName.name)
    const userRoleData = userRole.value.find(role => role.name === userRoleName.name);
    if (userRoleData) {
      role_id.value = userRoleData.id;
      return; // Exit loop after finding the first matching role
    }
  });
});
</script>

<template>
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true" aria-labelledby="editUserModalLabel" >
        <spinningOverLay :spinner="spinning"/>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role" >
            <div class="modal-content p-3 p-md-5">
              <button type="button" id="ModalUserEditClose" @click="modalClose" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div v-if="hasError" class="alert alert-danger">{{ errorMessage }}</div>
                <div class="text-center mb-4">
                  <h3 class="mb-2">Update User & Permission</h3>
                  <p class="text-muted">Permissions you use and assign to your users.</p>
                </div>
                <form class="row" @submit.prevent="submitForm">
                  <div class="mb-3">
                    <label class="form-label" for="esit-user-fullname">Full Name</label><span class="text-danger">*</span>
                    <input
                      type="text"
                      class="form-control"
                      id="esit-user-fullname"
                      placeholder="John Doe"
                      v-model="name"
                      name="name"
                      aria-label="John Doe"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="edit-user-email">Email</label><span class="text-danger">*</span>
                    <input
                      type="text"
                      id="edit-user-email"
                      class="form-control"
                      placeholder="john.doe@example.com"
                      aria-label="john.doe@example.com"
                      name="email"
                      v-model="email"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="edit-user-password">Password</label><span class="text-info"> (Optional)</span>
                    <input
                      type="password"
                      id="edit-user-password"
                      class="form-control"
                      placeholder="********"
                      aria-label="password"
                      v-model="password"
                      name="password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="edit-user-role">User Role</label><span class="text-danger">*</span>
                    <select id="edit-user-role" v-model="role_id" name="role_id" required class="form-select">
                      <option value="" selected disabled >Select User Role Permission</option>
                      <option v-for="(roles, index) in userRole" :key="index" :value="roles.id">{{roles.name}}</option>
                    </select>
                  </div>

                  <div class="col-12 text-center demo-vertical-spacing">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Update User</button>
                    <button
                      type="reset"
                      class="btn btn-label-secondary"
                      data-bs-dismiss="modal"
                      aria-label="Close">
                      Discard
                    </button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</template>
