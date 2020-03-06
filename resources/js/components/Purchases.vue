<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'purchase/create'}" class="btn btn-primary">Create Purchase</router-link>


        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Post list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Offering Title</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="purchase, index in purchases">
                        <td>{{ purchase.id}}</td>
                        <td>{{ purchase.offeringTitle }}</td>
                        <td>{{ purchase.quantity }}</td>
                        <td>{{ purchase.unitPrice }}</td>
                        <td>{{ purchase.total }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                purchases: [],
                user: {}
            }
        },
        created() {
            axios.get('/purchases').then(response => {
                this.purchases = response.data.purchases;
                this.user =  response.data.user
            });
        },
        methods: {
         //
        }
    }
</script>