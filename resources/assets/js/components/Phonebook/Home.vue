<template>
    <div>
        <nav class="panel is-offset-2 is-8">
            <div class="panel-heading">
                <p class="panel-block column is-fluid">
                    Phonebook
                    <button class="button is-link is-outlined" @click="addNew">
                        Add New
                    </button>
                    <span class="column has-text-primary is-pulled-right " v-if="loading">
                        <i class="fa fa-refresh fa-small fa-spin fa-lg fa-fw"></i>
                    </span>
                </p>
            </div>
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search" v-model="getResult">
                    <span class="icon is-small is-left">
        <i class="fa fa-search"></i>
      </span>
                </p>
            </div>


            <a class="panel-block is-active" v-for="(list,key) in tempResult">
                <span class="column is-9">{{list.name}}</span>
                <span class="has-text-danger panel-icon column is-1">
                    <i class="fa fa-trash" aria-hidden="true" @click="delPhone(key,list.id)"></i>
                </span>
                <span class="has-text-info panel-icon column is-1">
                    <i class="fa fa-book" aria-hidden="true" @click="openUpdate(key)"></i>
                </span>
                <span class="has-text-primary panel-icon column is-1">
                    <i class="fa fa-eye" aria-hidden="true" @click="openShow(key)"></i>
                </span>

            </a>


        </nav>

        <vue-modal :getModal="lunchModal" @close="closeModal"></vue-modal>
        <vue-show-modal :getshowModal="showActive" @close="closeModal"></vue-show-modal>
        <vue-update-modal :getupdateModal="updateActive" @close="closeModal"></vue-update-modal>

    </div>


</template>
<script >
    import Add from './Add.vue';
    import Show from './Show.vue';
    import Update from './Update.vue';
    export default {
        data(){
            return{
                lunchModal: '',
                showActive:'',
                updateActive:'',
                displayPhonebook:{},
                lists:{},
                errors:{},
                loading:false,
                getResult:'',
                tempResult:'',
            }
        },
        watch:{
            getResult(val){
                if(val.length > 0){
                    this.tempResult = this.lists.filter((item) =>{
//                        console.log(Object.keys(item));
                        return Object.keys(item).some((key) =>{
                            let str = String(item[key]);
//                            start the query according to the result
                            return str.toLowerCase().indexOf(val.toLowerCase()) > -1;
//                            console.log(str);
                        });

                    });

                }
                else{
                    this.tempResult = this.lists;
                }
            },
        },
        methods:{
            addNew(){
                this.lunchModal = 'is-active';
            },
            closeModal(){
                this.lunchModal = this.showActive = this.updateActive = '';
            },
            openShow(key){
                console.log(this.$children[1].list = this.tempResult[key]);
                this.showActive = 'is-active';
            },
            openUpdate(key){
                console.log(this.$children[2].list = this.tempResult[key]);
                this.updateActive = 'is-active';
            },

            delPhone(key,id){
                if (confirm('Are you sure ?')){
                    this.loading = !this.loading;
                    axios.delete(`/phonebook/`+id)
                        .then((response) =>
                        {
                            this.lists.splice(key,1);this.loading = !this.loading;
                            this.lists = this.tempResult ;
                        })
                        .catch((error) => console.log(error));
                }
            },
        },
        components:{
            'vue-modal':Add,
            'vue-show-modal':Show,
            'vue-update-modal':Update,
        },
        mounted(){
            axios.get('/getData')
                .then((response)=> this.lists = this.tempResult = response.data)
                .catch((error)=> this.errors = error.response.data);
        },
    }

</script>
<style>

</style>