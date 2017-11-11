<template>
    <div class="modal" :class="getModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Add New</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <div class="field ">
                    <label class="label">Name</label>
                    <div class="control ">
                        <input class="input" :class="{'is-danger':errors.name}" type="text"  placeholder="Name" v-model="list.name">
                        <span class="has-text-danger" v-if="errors.name">{{errors.name[0]}}</span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" :class="{'is-danger':errors.email}" placeholder="Email" v-model="list.email">
                        <span class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone No:</label>
                    <div class="control">
                        <input class="input" type="number" :class="{'is-danger':errors.phone_no}" maxlength="11" placeholder="Phone No:" v-model="list.phone_no">
                        <span class="has-text-danger" v-if="errors.phone_no">{{errors.phone_no[0]}}</span>
                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="saveData">Save</button>
                <button class="button" @click="closeModal">Cancel</button>
            </footer>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {

                errors:{},
                list:{
                    name:'',
                    email:'',
                    phone_no:'',
                },

            }
        },
        props:['getModal'],
        methods:{
            closeModal(){
                this.$emit('close');
            },
            saveData(){
                axios.post('/phonebook',this.$data.list).then((response) =>
                {
                    this.closeModal();
                    this.$parent.lists.push(response.data);
//                    sorting the response
                    this.$parent.lists.sort(function (a,b) {
                        if (a.name > b.name ){
                            return 1;
                        }
                        if(a.name < b.name){
                            return -1;
                        }
                    });
                    this.list = '';
                })
                    .catch((error)=> this.errors = error.response.data.errors);
            },
        }
    }
</script>
<style>

</style>