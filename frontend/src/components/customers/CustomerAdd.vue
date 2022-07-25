<template>
<div id="appCustomerAdd">
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-success fw-bold">Add Customer</h3>
                <p class="fw-italic">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti explicabo placeat eaque unde, obcaecati quasi ea ratione pariatur suscipit beatae cum est error, culpa exercitationem eligendi vero assumenda? Officiis, labore.</p>                
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div v-if="!submitted">
                <form>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="first_name" v-model="customer.first_name" placeholder="First Name">
                   </div> 
                   <div class="mb-2">
                        <input type="text" class="form-control" name="last_name" v-model="customer.last_name" placeholder="Last Name">
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="email" v-model="customer.email" placeholder="Email">
                   </div>
                   <div class="mb-2">                        
                        <select class="form-control" name="genger" v-model="customer.genger">                            
                            <option value="" disabled selected>Select your option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="ip_address" v-model="customer.ip_address" placeholder="IP Address">
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="company" v-model="customer.company" placeholder="Company">
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="city" v-model="customer.city" placeholder="City">
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="title" v-model="customer.title" placeholder="Title">
                   </div>
                   <div class="mb-2">
                        <input type="text" class="form-control" name="website" v-model="customer.website" placeholder="Web Site">
                   </div>
                   <div class="mb-2">
                        <button @click="saveCustomer" class="btn btn-success">Create Customer</button>
                   </div>
                </form>
                </div>
                <div v-else>
                    <h4>You submitted successfully!</h4>
                    <button class="btn btn-success" @click="newCustomer">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import CustomerDataService from '@/services/CustomerDataService';

export default {
  name: "appCustomerAdd",
  data() {
     return {
          customer: {
               id: null,
               first_name: '',
               last_name: '',
               email: '',
               gender: '',
               ip_address: '',
               company: '',
               city: '',
               title: '',
               website: ''
          },
          submitter: false
     };
  },
  methods: {
     saveCustomer() {
          var data = {
               first_name: this.customer.first_name,
               last_name: this.customer.last_name,
               email: this.customer.email,
               gender: this.customer.gender,
               ip_address: this.customer.ip_address,
               company: this.customer.company,
               city: this.customer.city,
               title: this.customer.title,
               website: this.customer.website,
          };

          CustomerDataService.create(data)
               .then(response => {
                    this.customer.id = response.data.id;
                    this.submitter = true;
               })
               .catch(e => {
                    console.error(e)
               })
     },
     newCustomer() {
          this.submitter = false;
          this.customer = {}
     }
  }
}
</script>