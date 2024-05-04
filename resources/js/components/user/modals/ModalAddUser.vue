<script setup>
import {onMounted, ref} from "vue";
import spinningOverLay from "@/components/spinning-overlay/SpinningOverLay.vue";
import axios from "axios";
// Create a ref to track loading state
const spinning = ref(false);
const userRole = ref([]);
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
        name: name.value,
        email: email.value,
        password: password.value,
        role_id: role_id.value,
    }
    spinning.value=true;
    axios.post('/admin/user/store',user).then(res=>{
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
    const addModalClose = document.getElementById('ModalUserClose')
    addModalClose.click()
    // Reset form
    name.value = '';
    email.value = '';
    password.value = '';
    role_id.value = '';
};
onMounted(()=>{
  roleList();
});
</script>

<template>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <spinningOverLay :spinner="spinning"/>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" id="ModalUserClose" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div v-if="hasError" class="alert alert-danger">{{ errorMessage }}</div>
                <div class="text-center mb-4">
                  <h3 class="mb-2">Add New User & Permission</h3>
                  <p class="text-muted">Permissions you use and assign to your users.</p>
                </div>
                <form id="addPermissionForm" class="row" @submit.prevent="submitForm">
                  <div class="mb-3">
                    <label class="form-label" for="add-user-fullname">Full Name</label><span class="text-danger">*</span>
                    <input
                      type="text"
                      class="form-control"
                      id="add-user-fullname"
                      placeholder="John Doe"
                      v-model="name"
                      name="name"
                      aria-label="John Doe"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="add-user-email">Email</label><span class="text-danger">*</span>
                    <input
                      type="text"
                      id="add-user-email"
                      class="form-control"
                      placeholder="john.doe@example.com"
                      aria-label="john.doe@example.com"
                      name="email"
                      v-model="email"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="add-user-password">Password</label><span class="text-danger">*</span>
                    <input
                      type="password"
                      id="add-user-password"
                      class="form-control"
                      placeholder="********"
                      aria-label="password"
                      required
                      v-model="password"
                      name="password" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="user-role">User Role</label><span class="text-danger">*</span>
                    <select id="user-role" v-model="role_id" name="role_id" required class="form-select">
                      <option value="" selected disabled >Select User Role Permission</option>
                      <option v-for="(roles, index) in userRole" :key="index" :value="roles.id">{{roles.name}}</option>
                    </select>
                  </div>

                  <div class="col-12 text-center demo-vertical-spacing">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Create User</button>
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
