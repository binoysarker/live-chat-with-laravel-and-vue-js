<template>
    <div class="modal" :class="getshowModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Details of {{list.name}}</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <table class="table">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone No</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{list.name}}</td>
                        <td>{{list.email}}</td>
                        <td>{{list.phone_no}}</td>
                    </tr>
                    </tbody>
                </table>

            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="closeModal">Cancel</button>
            </footer>
        </div>
    </div>
</template>
<script !src="">
    export default {
        data(){
            return{
                list:'',
            }
        },
        props:['getshowModal'],
        methods:{
            closeModal(){
                this.$emit('close');
            },
        },
    }
</script>