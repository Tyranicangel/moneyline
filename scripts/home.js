var app=angular.module('mlApp',[],function($httpProvider){
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
});

app.controller('UniqueCtrl', ['$scope', function ($scope) {
	$scope.items=itemsdat;
	$scope.pics=[];
	$scope.mainpic=0;
	angular.forEach($scope.items,function(item){
		if(item[1]!='')
		{
			$scope.pics.push(item[1]);
		}
	});

	$scope.showleft=function(){
		if($scope.mainpic==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	$scope.showright=function(){
		if($scope.mainpic==($scope.pics.length-1))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	$scope.move_left=function(){
		if($scope.mainpic!=0)
		{
			$scope.mainpic=$scope.mainpic-1;
		}
	}

	$scope.move_right=function(){
		if($scope.mainpic!=($scope.pics.length-1))
		{
			$scope.mainpic=$scope.mainpic+1;
		}
	}
}]);

app.controller('HomeCtrl', ['$scope','$http', function ($scope, $http) {
	$scope.items=itemsdata;
	$scope.singleitem=[];
	$scope.multiples=[];
	$scope.pics=[];
	$scope.mainpic=0;

	$scope.gen_mul=function(){
		$scope.mulitems=angular.copy($scope.items);
		$('.lightbox').fadeIn();
		$('.gen_mult_url_lightbox_panel').fadeIn();
	}

	$scope.showleft=function(){
		if($scope.mainpic==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	$scope.showright=function(){
		if($scope.mainpic==($scope.pics.length-1))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	$scope.move_left=function(){
		if($scope.mainpic!=0)
		{
			$scope.mainpic=$scope.mainpic-1;
		}
	}

	$scope.move_right=function(){
		if($scope.mainpic!=($scope.pics.length-1))
		{
			$scope.mainpic=$scope.mainpic+1;
		}
	}

	$scope.generate_multiple=function(){
		if(!$scope.mulname)
		{
			$scope.mul_error_msg='Please give a name for the url';
			$scope.mul_error=true;
		}
		else if(!(/^\d+$/.test($scope.tc)))
		{
			$scope.mul_error_msg='Please check the amount you have entered';
			$scope.mul_error=true;
		}
		else if($scope.mulnl==false && /^\d+$/.test($scope.mulurllmt)==false)
		{
			$scope.error_msg='Please check the url limit you entered';
			$scope.single_error=true;
		}
		else
		{
			var itemids="";
			angular.forEach($scope.multiples,function(item){
				itemids=itemids+item[0]+'|';
			});
			$http({
				method:'POST',
				url:'generate_url_multiple.php',
				data:$.param({items:itemids,name:$scope.mulname,desc:$scope.muldesc,cost:$scope.tc,rems:$scope.mulrems,urllmt:$scope.mulurllmt,umlmt:$scope.mulnl})
			}).success(function(result){
				console.log(result);
				if(result=='Error')
				{
					$scope.error_msg='Error sending data to the server.';
					$scope.single_error=true;
				}
				else if(result=='Invalid')
				{
					$scope.error_msg='Please login before generating url.';
					$scope.single_error=true;
				}
				else if(result=='Fail')
				{
					$scope.error_msg='Error generating url. Please contact admin team.';
					$scope.single_error=true;
				}
				else if(result[0]=='Success')
				{
					$scope.mulgenerated='http://www.money-line.in/uniquelink.php?token='+result[1];
				}
			});
		}

	}

	$scope.nxt_mul=function(){
		$scope.multiples=[];
		$scope.tc=0;
		$scope.pics=[];
		$scope.mainpic=0;
		$scope.mulnl=true;
		$scope.mulurllmt='';
		$scope.muldesc='';
		angular.forEach($scope.mulitems,function(item){
			if(item[9])
			{
				$scope.multiples.push(item);
				$scope.tc+=parseInt(item[4]);
				if(item[7]!='')
				{
					$scope.pics.push(item[7]);
				}
			}
		});
		if($scope.multiples.length>1)
		{
			$('.gen_mult_url_lightbox_panel').hide();
			$('.gen_mul_url_next_lightbox_panel').fadeIn();
		}
		else
		{
			$scope.nxt_error=true;
			$scope.nxt_error_msg='Please select atleast two items.'
		}
	}

	$scope.gen_url=function(item){
		$scope.singleitem=angular.copy(item);
		$scope.singleitem[9]=true;
		$scope.singleitem[10]='';
		$scope.singleitem[11]='';
		$scope.single_error=false;
		$scope.generated='';
		$('.lightbox').fadeIn();
		$('.gen_url_lightbox_panel').fadeIn();
	}

	$scope.focus_gen=function(){
		$('#single_gen').select();
	}

	$scope.mul_focus=function(){
		$('#mul_gen').select();
	}

	$scope.close_single=function(){
		$('.lightbox').hide();
		$('.gen_url_lightbox_panel').hide();
	}

	$scope.single_gen=function(){
		if(!(/^\d+$/.test($scope.singleitem[4])))
		{
			$scope.error_msg='Please check the cost you have entered.';
			$scope.single_error=true;
		}
		else if($scope.singleitem[9]==false && /^\d+$/.test($scope.singleitem[10])==false)
		{
			$scope.error_msg='Please check the url limit you entered';
			$scope.single_error=true;
		}
		else
		{
			$http({
				method:'POST',
				url:'generate_url_single.php',
				data:$.param({dat:$scope.singleitem}),
			}).success(function(result){
				if(result=='Error')
				{
					$scope.error_msg='Error sending data to the server.';
					$scope.single_error=true;
				}
				else if(result=='Invalid')
				{
					$scope.error_msg='Please login before generating url.';
					$scope.single_error=true;
				}
				else if(result=='Fail')
				{
					$scope.error_msg='Error generating url. Please contact admin team.';
					$scope.single_error=true;
				}
				else if(result[0]=='Success')
				{
					$scope.generated='http://www.money-line.in/uniquelink.php?token='+result[1];
				}
			});
		}
	}

}]);

$(document).ready(function(){

	$(document).on('click','.edit_icon_cls',function(){ //show edit item lgt box panel
		$('.lightbox').fadeIn();
		$('.gen_edit_lightbox_panel').fadeIn();
	});

	$(document).on('click','.lght_box_edit_close_btn',function(){ //edit light box panel close
		$('.lightbox').hide();
		$('.gen_edit_lightbox_panel').hide();
	});

	$(document).on('click','#whats_this_a_id',function(){ //show whats this
		$('.whats_this_li').show();
	});

	$('#type_select').change(function(){
		if($(this).val()=='business')
		{
			$('#logo_li').show();
		}
		else
		{
			$('#logo_li').hide();
		}
	});

	$("#register_form").on('submit',function(e){
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if($('#fname').val()=='')
		{
			e.preventDefault();
			$('#register_error').html('* Please enter your full name.');
		}
		else if($('#email').val()=='' || !re.test($('#email').val()))
		{
			e.preventDefault();
			$('#register_error').html('* Please enter a valid email id.');
		}
		else if($('#phone').val()=='')
		{
			e.preventDefault();
			$('#register_error').html('* Please enter your phone number.');
		}
		else if($("#type_select").val()=='select')
		{
			e.preventDefault();
			$('#register_error').html('* Please select your organisation type.');
		}
		else if($('#address').val()=='')
		{
			e.preventDefault();
			$('#register_error').html('* Please enter your address.');
		}
		else if($("#type_select").val()=='business' && $("#logo").val()=='')
		{
			e.preventDefault();
			$('#register_error').html('* Please upload your logo.');
		}
		else if(!$("#termsbox").is(':checked'))
		{
			e.preventDefault();
			$('#register_error').html('* Please agree to our terms and conditions.');
		}
	});

	$('#verify_form').submit(function(e){
		if($('#pass').val()=="")
		{
			e.preventDefault();
			$('#verify_error').html('* Please enter your password.');
		}
		else if($('#conf').val()=="")
		{
			e.preventDefault();
			$('#verify_error').html('* Please confirm your password.');
		}
		else if($('#pass').val()!=$("#conf").val())
		{
			e.preventDefault();
			$('#verify_error').html('* Both passwords do not match.');
		}
		else if($('#pass').val().length<8)
		{
			e.preventDefault();
			$('#verify_error').html('* The password must be atleast 8 character length.');
		}
	});

	$(".createitembtn").click(function(){

		var itemprice = $("#itemprice").val();
		var itemdesc = $("#itemdesc").val();
		var itemname = $("#itemname").val();
		var itempic = $("#itempic").val();

		if($('#itempic').prop('files')[0]) {
			var imgsize = $('#itempic').prop('files')[0]['size'];
		} else {

			var imgsize = 0;
		}

		if(imgsize == 0 || (imgsize != 0 && imgsize < 10000000)) {

			var data = new FormData();
	    	data.append('itempic', $('#itempic').prop('files')[0]);
	    	data.append('itemname', itemname);
	    	data.append('itemdesc', itemdesc);
	    	data.append('itemprice', itemprice);

			if(itemname == "") {

				alert("Please enter a name for the item");
			} else {

				$.ajax({
					type:'POST',
					processData: false, // important
	        		contentType: false, // important
					url:'createitem_action.php',
					data:data,
					success:function(result)
					{
						 // $("#itemprice").val('');
						 // $("#itemdesc").val('');
						 // $("#itemname").val('');
						 // $("#itempic").val('');
						 // $(".imgs").removeAttr('src');
						 // $(".mesgbox").html("<h4>Item added successfully</h4>");
						 console.log(result);
					}
				});
			}
		} else {

			alert("Image size is very large!");
		}
	});

	$(document).on('click','.lght_box_gen__mul_url_close_btn',function(){ //gen mult light box panel close
		$('.lightbox').hide();
		$('.gen_mult_url_lightbox_panel').hide();
	});

	$(document).on('click','.lght_box_mul_url_next_close_btn',function(){ //gen mult light box panel close
		$('.lightbox').hide();
		$('.gen_mul_url_next_lightbox_panel').hide();
	});
});