<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'purchases'}" class="btn btn-primary">
                <i class="fa fa-angle-double-left"></i>
                Back
            </router-link>
        </div>
        <h1>Create Purchase</h1>
        <form @submit.prevent="createPurchase" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Customer Name:</label>
                        <input type="text" class="form-control" v-model="purchase.customer" :class="{ 'is-invalid': errors.customer }">
                        <span class="invalid-feedback" v-if="errors.customer">
                                <strong>{{ errors.customer[0] }}</strong>
                            </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Offering ID:</label>
                        <select class='form-control' v-model='purchase.offer'>
                            <option value='0' disabled>Select Offering</option>
                            <option v-for='offering in offerings' :value='offering.id'>{{ offering.title}}</option>
                        </select>
                        <span class="invalid-feedback" v-if="errors.offer">
                                <strong>{{ errors.offering[0] }}</strong>
                            </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Quantity:</label>
                    <input type="text" class="form-control" v-model="purchase.quantity" :class="{ 'is-invalid': errors.quantity }">
                    <span class="invalid-feedback" v-if="errors.quantity">
                                <strong>{{ errors.quantity[0] }}</strong>
                            </span>
                </div>
            </div>
            <br/>

            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: {},
                purchase: {},
                user: {},
                offerings: []
            }
        },
        created(){
            this.getOfferings();
        },
        methods: {
            getOfferings: function(){
                axios.get('/getOfferings')
                    .then(function (response) {
                        this.offerings = response.data.offerings;
                    }.bind(this));

            },

            createPurchase() {

                axios.post('/purchase/create', this.purchase)
                    .then(response => {
                        this.$router.push({path: '/'});
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors
                    });
            }
        }

    }
</script>
