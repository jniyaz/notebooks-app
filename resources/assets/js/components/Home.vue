<template>
    <div class="container">
        <div class="row col-md-4 pull-right">
            <router-link to="/create" class="btn btn-primary">Create Notebook</router-link>
        </div>
        <div class="row">
            <div class="loader" v-if="loading"></div>
            <div class="col-md-8">
                <div class="panel panel-default" v-if="notebookPanel" v-for="notebook in notebooks">
                    <div @click.prevent="deleteIt(notebook.id)" class="btn pull-right"><i class="fa fa-times"></i></div>
                    <div @click="editIt(notebook.id)" class="btn pull-right"><i class="fa fa-pencil"></i></div>
                    <form @submit.prevent="updateIt(notebook.id)">
                    <div class="panel-heading">
                    <strong v-show="!showIt(notebook.id)">{{ notebook.name }}</strong>
                    <input v-show="showIt(notebook.id)" type="text" class="form-control" v-model="notebookEditData.name" />
                    </div>
                    <div class="panel-body">                        
                    <span v-show="!showIt(notebook.id)">{{ notebook.body }}</span>
                    <input v-show="showIt(notebook.id)" type="text" class="form-control" v-model="notebookEditData.body" />
                    </div>
                    <div class="panel-footer">
                        <button type="submit" v-show="showIt(notebook.id)" class="btn-sm btn-success">Ok</button>
                        <button @click.prevent="editForm=false" v-show="showIt(notebook.id)" class="btn-sm btn-default">Cancel</button>
                        - by {{ notebook.user.name }}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notebooks:[],
                notebookPanel:false,
                loading:false,
                editForm:"",
                notebookEditData: {name: '', body: ''}
            }
        },
        methods: {
            editIt(notebookId){

                this.notebooks.forEach((notebook, i)=>{
                    if(notebook.id==notebookId){
                        this.notebookEditData=notebook;
                    }
                });

                return this.editForm=notebookId;
            },
            showIt(notebookId){
                if(this.editForm==notebookId){
                    return true;
                }
                return false;
            },
            updateIt(notebookId){
                axios.put('/notebook/'+notebookId, this.notebookEditData)
                .then(res=>{
                    //console.log(res);
                    this.editForm=false;
                    this.notebookEditData="";
                    this.$router.push('/');
                });
            },
            deleteIt(notebookId){
                let ok = confirm('Are you sure?');
                if(ok){
                    axios.delete('/notebook/'+notebookId)
                    .then(res=>{
                        //console.log(res);
                        this.fetchData();
                    });
                }
            },
            fetchData(){
                // method 1
                // var self=this;
                // axios.get('/notebook').then(function(res){
                //     self.notebooks=res.data;
                //     // console.log(res);
                // });

                //method 2 - ES6
                this.loading=true;            
                axios.get('/notebook').then((res)=>{this.notebooks=res.data;this.notebookPanel=true;this.loading=false});
                //console.log(res);
            }
        },
        mounted() { 
            this.fetchData();
        }
    }
</script>
