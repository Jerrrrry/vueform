Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
Vue.component('shop',{
		template:'#shop-template',
		computed:{
			sum:function(){
				var sum=0;
				this.list.forEach(function(item){
					sum+=item.price*item.quantity;
				});
				return sum;
			}
		},
		data:function(){
			return {
				newlist:{name:'',quantity:'',price:''},
				editlist:{id:'',name:'',quantity:'',price:''},
				list:[]

			};
		},
		created:function(){
				this.fetchData();
		},
		methods:{
			//create data for edit data 
			importList:function(list){
				this.editlist.id=list.id;
				this.editlist.name=list.name;
				this.editlist.price=list.price;
				this.editlist.quantity=list.quantity;
			},
			//end


			updateList:function(editlist,list){
				this.$http.put('api/update/'+this.editlist.id,this.editlist).success(function(response){
					this.list.push(this.editlist);
					this.list.$remove(list);
					this.editlist={id:"",name:'',price:'',quantity:''};

				});
			},
			deleteList:function(list){
				this.list.$remove(list);
				this.$http.delete('api/total/'+list.id,list);
			},
			fetchData:function(){
				this.$http.get('api/total',function(list){
					this.list=list;
				}.bind(this));
			},
			addList:function(){
				if(this.newlist.name&&this.newlist.price&&this.newlist.quantity){
					this.$http.post('api/total',this.newlist).success(function(response){
						this.list.push(this.newlist);
						this.newlist={name:'',price:'',quantity:''};
						console.log('success');
					}).error(function(error){
						console.log(error);
					});
				}
			}
		}


});




new Vue({

	el:'body',
	


});