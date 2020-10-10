<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
            background-color: #fff;
            color: #636b6f;
            /* font-family: 'Raleway', sans-serif; */
            font-weight: 100;
            height: auto;
            margin: 0;
            }
            .container{
                margin-top:5rem;
            }
            .full-height {
                min-height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
            /*  text-align: center; */
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
            }
            .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
            }
            .modal-container {
            width: 40%;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
            }
            .modal-header h3 {
            margin-top: 0;
            color: #42b983;
            }
            .modal-body {
            margin: 20px 0;
            }
            .tr{
            background: #2b30d1;
            color: #fff;
            }
            button{
                padding:10px;
                margin-bottom:20px;
            }
        </style>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                        <h3 class="text-center">Add Member</h3>
                        <div id="app">
                            <form action="">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text"name="name" id="name" class="form-control" required placeholder="Enter your name" v-model="newItem.name">
                                </div>

                                <div class="form-group">
                                    <label for="name">Age:</label>
                                    <input type="number" name="age" id="age" class="form-control" required placeholder="Enter your age" v-model="newItem.age">
                                </div>

                                <div class="form-group">
                                    <label for="name">Profession:</label>
                                    <input type="text" name="profession" id="profession" class="form-control" required placeholder="Enter your profession" v-model="newItem.profession">
                                </div>
                                <div class="form-group">
                                   <button class="btn btn-success float-right" @click.prevent="createItem()">Add</button>
                                </div>
                               
                                <div class="clearfix"></div>
                                <div class="text-center alert alert-danger" v-bind:class="{'d-none': hasError}">please fill all inputs</div>
                                <div class="text-center alert alert-success" v-bind:class="{'d-none': hasDelete}">Deleted successfully</div>
                                
                             
                            </form>
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="search" placeholder="Please search by name" @input="searchMember">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="tr">
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Age</th>
                                            <th class="text-center">Profession</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in items">
                                            <td class="text-center">@{{item.name}}</td>
                                            <td class="text-center">@{{item.age}}</td>
                                            <td class="text-center">@{{item.profession}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a  id="show-modal" class="btn btn-primary btn-sm" @click="showModal = true; setVal(item.id, item.name, item.age, item.profession)">edit</a>
                                                    <a href="" class="btn btn-danger btn-sm" @click.prevent="deleteItem(item)">delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <modal v-if="showModal" @close="showModal=false">
                                    <h3 slot="header">Edit Member</h3>
                                    <div slot="body">
                                        
                                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                                required  :value="this.e_id">
                                        Name: <input type="text" class="form-control" id="e_name" name="name"
                                                required  :value="this.e_name">
                                        Age: <input type="number" class="form-control" id="e_age" name="age"
                                        required  :value="this.e_age">
                                        Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                                        required  :value="this.e_profession">
                                        
                                    
                                    </div>
                                    <div slot="footer">
                                        <button class="btn btn-default" @click="showModal = false">
                                        Cancel
                                    </button>
                                    
                                    <button class="btn btn-info" @click.prevent="editItem()">
                                        Update
                                    </button>
                                    </div>
                                </modal>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>

           
        </div>


<script src="https://cdn.jsdelivr.net/npm/vue-js-modal@2.0.0-rc.6/dist/index.js"></script>
        <script>
          
            Vue.component('modal',{
                template: '#modal-template'
            })
            var app = new Vue({
                el: '#app',
                data: {
                    newItem: {'name':'','age':'','profession':''},
                    hasError: true,
                    hasDelete: true,
                    showModal: false,
                    items: [],
                    searchItem: [],
                    e_id: '',
                    e_name: '',
                    e_age: '',
                    e_profession: '',
                    search: ''
                },
                mounted: function mounted(){
                    this.getMember();
                },
                methods:{
                    
                    getMember: function getMember(){
                        var _this = this;
                        axios.get('/getMember').then(function(response){
                            _this.items = response.data;
                            
                        });
                    },
                    searchMember: function searchMember(){
                        var _this = this;
                        var name = _this.search;
                        if(name != ''){
                        axios.get('/searchMember/'+name).then(function(response){  
                            _this.items = response.data;
                        })
                        .catch(function (error){
                            this.getMember();
                        })
                        }else{
                            this.getMember();
                        }
                    },
                    setVal: function setVal(val_id, val_name,val_age,val_profession)
                    {
                        this.e_id = val_id;
                        this.e_name = val_name;
                        this.e_age = val_age;
                        this.e_profession = val_profession;

                    },
                    createItem: function createItem(){
                        var input = this.newItem;
                        var _this = this;
                        if(input['name'] == '' || input['age'] == '' || input['profession'] == '')
                        {
                            this.hasError = false;
                            this.hasDelete = true;
                            
                        }
                        else{
                            this.hasError = true;
                            this.hasDelete = true;
                            axios.post('/store',input).then(function(response){
                                _this.newItem = {'name':'','age':'','profession':''}
                                _this.getMember();
                            });
                        }
                       
                    },
                    editItem: function editItem(){
                            var i_val_1 = document.getElementById('e_id');
                            var n_val_1 = document.getElementById('e_name');
                            var a_val_1 = document.getElementById('e_age');
                            var p_val_1 = document.getElementById('e_profession');

                            axios.post('/editItem/' + i_val_1.value, {val_1: n_val_1.value, val_2: a_val_1.value,val_3: p_val_1.value })
                                .then(response => {
                                this.getMember();
                                this.showModal=false
                                });
                           
                            
                    },
                    deleteItem: function deleteItem(item){
                        var _this = this;
                        axios.post('/deleteItem/'+item.id).then(function(response){
                           _this.getMember();
                           _this.hasDelete = false;
                           _this.hasError = true;
                            
                        });
                    }
                }
                });
        </script>

    <script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  default footer
                  <button class="modal-default-button" @click="$emit('close')">
                    OK
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
    </body>
</html>
