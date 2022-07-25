<template>
  <div class="home">    
    <CustomerGrid/>
  </div>
</template>

<script>
// @ is an alias to /src
import CustomerGrid from '@/components/customers/CustomerGrid.vue'

export default {
  name: 'HomeView',
  components: {
    CustomerGrid
}
}
</script>
