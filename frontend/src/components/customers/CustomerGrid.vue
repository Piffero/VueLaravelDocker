<template>
<div id="appCustomerGrid">
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-success fw-bold">Customer Manager</h3>
                <p class="fst-italic">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque aliquam recusandae est qui nobis quibusdam facere quisquam, commodi eum fugit magni eveniet eos fugiat voluptate alias provident eaque. Ipsum, adipisci!</p>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Search Name" />
                        </div>
                        <div class="col">
                            <button @click="searchCustomer" class="btn btn-outline-dark">Search</button>
                        </div>
                        <div class="col-md-6" v-if="customers.length > 0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#" @click="previous">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">{{ pageData.current_page }}</a></li>
                                    <li class="page-item"><a class="page-link" href="#" @click="next">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6"
                 v-for="(customer, index) in customers" :key="index">
                <div class="card my-2 list-group-item-success shadow-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <img src="../../assets/icon/userDefault.png" alt="" class="cusomer-img">
                            </div>
                            <div class="col-sm-7">
                                <ul class="list-group">
                                    <li class="list-group-item">Name: <span class="fw-bold">{{ customer.CustomerFirstName }} {{ customer.CustomerLastName }}</span></li>
                                    <li class="list-group-item">Email: <span class="fw-bold">{{ customer.CustomerEmail}}</span></li>
                                    <li class="list-group-item">Company: <span class="fw-bold">{{ customer.CustomerCompany }}</span></li>
                                </ul>
                            </div>
                            <div class="col-sm-1 d-flex flex-column justify-content-center align-items-center">
                                <router-link :to="'/customers/' + customer.id +'/edit'" class="btn btn-primary btn-sm my-1"><i class="fa fa-edit"></i></router-link>                                
                                <button class="btn btn-danger btn-sm my-1"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import CustomerDataService from '@/services/CustomerDataService';


export default {
  name: "appCustomerGrid",
  data() {
    return {
        customers: [],
        pageData: [],
        qtdeCustomerLastName: {with: 0,  without: 0 },
        qtdeCustomerGender: {with: 0,  without: 0 },
        qtdeCustomerEmail: {valid: 0,  invalid: 0 },
        searchName: ''
    }
  },
  methods: {
    getCustomerAll() {
        CustomerDataService.getAll()
            .then(response => {                
                this.pageData = response.data
                this.customers = this.pageData.data;                
                this.qtdeCustomerLastName = response.data.qtdeCustomerLastName;
                this.qtdeCustomerGender = response.data.qtdeCustomerGender;
                this.qtdeCustomerEmail = response.data.qtdeCustomerEmail;
            })
            .catch(e => {
                console.error(e)
            })
    },
    searchCustomer() {
        CustomerDataService.findByName(this.searchName)
            .then(response => {
                this.customers = response.data
            })
            .catch(e => {
                console.error(e)
            })
    }
  },
  mounted() {
        this.getCustomerAll()
  }
};
</script>