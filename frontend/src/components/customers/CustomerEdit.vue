<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-success fw-bold">Edit Customer</h3>
                <p class="fw-italic">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti explicabo placeat eaque unde, obcaecati quasi ea ratione pariatur suscipit beatae cum est error, culpa exercitationem eligendi vero assumenda? Officiis, labore.</p>                
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div v-if="!submitted">
            <div class="row">
                <div class="col-md-4">
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
                            <select class="form-control" name="genger" v-model="customer.gender">                            
                                <option value="" disabled>Select your option</option>
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
                            <button @click="saveCustomer" class="btn btn-success">Update Customer</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <img src="../../assets/icon/userDefault.png" alt="" class="cusomer-img">
                </div>
            </div>
        </div>
        <div v-else>
            <h4>You submitted successfully!</h4>
            <button class="btn btn-dark" @click="backCustomer"><i class="fa fa-arrow-left"></i> Back</button>
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
    getCustomer(id) {
        CustomerDataService.get(id)
            .then(response => {    
               this.customer.id = response.data.id;
               this.customer.first_name = response.data.CustomerFirstName;
               this.customer.last_name = response.data.CustomerLastName;
               this.customer.email = response.data.CustomerEmail;
               this.customer.gender = response.data.CustomerGender;
               this.customer.ip_address = response.data.CustomerIpAddress;
               this.customer.company = response.data.CustomerCompany;
               this.customer.city = response.data.CustomerCity;
               this.customer.title = response.data.CustomerTitle;
               this.customer.website = response.data.CustomerWebSite;
            })
            .catch(e => {
                console.error(e)
            })
    },
    saveCustomer() {
          var data = {
               id: this.getIDfromURL(),
               first_name: this.customer.CustomerFirstName,
               last_name: this.customer.CustomerLastName,
               email: this.customer.CustomerEmail,
               gender: this.customer.CustomerGender,
               ip_address: this.customer.CustomerIpAddress,
               company: this.customer.CustomerCompany,
               city: this.customer.CustomerCity,
               title: this.customer.CustomerTitle,
               website: this.customer.CustomerWebSite,
          };

          CustomerDataService.update(data)
               .then(response => {
                    this.customer.id = response.data.id;
                    this.submitter = true;
               })
               .catch(e => {
                    console.error(e)
               })
    },
    backCustomer() {
          this.submitter = false;
          this.mounted();
    },
    getIDfromURL() {
        return window.location.pathname.split('/')[2];
    },    
  },
  mounted() {
    let id = this.getIDfromURL();
    this.getCustomer(id)
  }

}
</script>