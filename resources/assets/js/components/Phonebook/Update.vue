<template>
    <div class="modal" :class="getupdateModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Update {{list.name}}'s Detail</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <div class="field ">
                    <label class="label">Name</label>
                    <div class="control ">
                        <input class="input" :class="{'is-danger':errors.name}" type="text"  v-model="list.name">
                        <span class="has-text-danger" v-if="errors.name">{{errors.name[0]}}</span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" :class="{'is-danger':errors.email}" v-model="list.email">
                        <span class="has-text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone No:</label>
                    <div class="control">
                        <input class="input" type="number" :class="{'is-danger':errors.phone_no}" maxlength="11" v-model="list.phone_no">
                        <span class="has-text-danger" v-if="errors.phone_no">{{errors.phone_no[0]}}</span>
                    </div>
                </div>

            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="updateData">Update</button>
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
                list:'',


            }
        },
        props:['getupdateModal'],
        methods:{
            closeModal(){
                this.$emit('close');
            },
            updateData(){
                axios.patch(`/phonebook/${this.list.id}`,this.$data.list).then((response) => this.closeModal())
                    .catch((error)=> this.errors = error.response.data.errors);
            },
        }
    }
</script>
<style>

</style>