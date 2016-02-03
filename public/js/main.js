
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
Vue.component('tasks',{
		template:'#tasks-template',
		computed:{

				remaining:function(){
					return this.list.length;
				}


		},
		//props:['list'],
		data:function(){

			return {
				//task:{id:'',body:'',completed:'0',created_at:'',updated_at:''},
				newtask:{body:''},
				list:[]
			};	

		},
		created:function(){
//get data from api , and bind the data to list[]
				this.fetchData();
		},
		methods:{
			deleteTask:function(task){
				//Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


				this.list.$remove(task);
				this.$http.delete('api/tasks/'+task.id,task);
			},
			fetchData:function(){

				//$.getJSON('api/tasks',function(tasks){

				//		this.list=tasks;
				//}.bind(this));
				this.$http.get('api/tasks',function(task){
					this.list=task;
				}.bind(this));

			},
			addTask:function(){

				if(this.newtask.body){

					this.$http.post('api/tasks', this.newtask).success(function(response) {
  							this.list.push(this.newtask);
  							this.newtask={body:''};
  							console.log("Event added!");
						}).error(function(error) {
 						 console.log(error);
						});

					
					
				}
			}



		}

});

new Vue({

	el:'body',
	


});