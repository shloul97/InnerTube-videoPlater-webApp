let username;
let userId;
let wallet;
let subRole;

function getUserData(){
   var url = 'jsondata=1';
   var request = new XMLHttpRequest();
   request.onreadystatechange =  function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
         var myarr = JSON.parse(request.response);

         for(var key in myarr){
            username = myarr[key].username;
            userId = myarr[key].userId;
         }
      }
   }
   request.open('POST', '../userdata.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
}

$(document).ready(function(){
getUserData();
var searchInput = $('.search-input');
var btn = $('.search-btn');
var accountBtn = $('.dropdown');
var logbtn = $('#login-btn');
var regbtn = $('#register-btn');
var name = localStorage.getItem("name");
var coin = $('.select-coin');


if(name != ''){
 getloginforminfo(name);
}
$('#like-btn').click(function(){
   if($(this).hasClass('bi-heart')){
      $(this).removeClass('bi-heart');
      $(this).addClass('bi-heart-fill');

      var vidId = $(this).attr('data-id');
      var url = 'action=add&vidId='+vidId;
      var request = new XMLHttpRequest;
      request.onreadystatechange = function(){
         if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
            //console.log(request.response);
         }
      }
      request.open('POST', 'addLike.php?',true);
      request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      request.send(url);
   }
   else{
      $(this).removeClass('bi-heart-fill');
      $(this).addClass('bi-heart');
      var vidId = $(this).attr('data-id');
      var url = 'action=remove&vidId='+vidId;
      var request = new XMLHttpRequest;
      request.onreadystatechange = function(){
         if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
            //console.log(request.response);
         }
      }
      request.open('POST', 'addLike.php?',true);
      request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
      request.send(url);
   }
//$(this).toggleClass('bi-heart bi-heart-fill');
});


var a = $('a[name=profile-select]');
a.click(function(){
   var id= $(this).attr('id') + '-a';
   if(id == 'box2-a'){
      get_favChannel();
   }
   if(id == 'box3-a'){
      get_like();
   }
   a.removeClass('active1' , {duration:100})
   $(this).addClass('active1' , {duration:100})
   $('#'+id).show(300);
   
   for(var i = 1 ; i <= 4;i++){

      var id2 = 'box'+i+'-a';
      if(id2 != id){
      $('#'+id2).hide(200);
     }
   }

});

coin.click(function(){
   var array = ['btc','ltc','dog'];
   var id = $(this).attr('id');
   $(this).addClass('active1');
   $('#'+id+'-pl').show(300);
   for(var i = 0; i < array.length;i++){
      if(array[i] != id){
         $('#'+array[i]+'-pl').hide(300);
         $('#'+array[i]).removeClass('active1');
      }
   }
});
function getloginforminfo(name){
   if(name == 'login'){
   $('#login-fld').addClass('active');
   $('#reg-fld').removeClass('active',200);
   $('#register').fadeOut(function(){
   $('#login').fadeIn(100);
   });
   }
   if(name == 'register'){
   $('#reg-fld').addClass('active');
   $('#login-fld').removeClass('active');
   $('#login').fadeOut(function(){
   $('#register').fadeIn(100);
   });

   }
}
searchInput.keyup(function(){
   if($.trim(this.value).length > 0){
        btn.show()
  		btn.animate({width : '60px'}, 'fast');
   }
   else
      btn.hide();
});

accountBtn.click(function(){
   /*$('.dropdown-content').toggle(200);*/
   //$(".pop").load("../login.html");
      //$('.pop').dialog();
      $('.m-user-area').show(function(){
      $(this).animate({width:'320px'},50);
   });
   $('.overlay').fadeIn(100);


});


$('#header-menu').click(function(){
   $('.mside').show(function(){
      $(this).animate({width:'170px'},50);
   });
   $('.overlay').fadeIn(100);
});
$('#account-menu').click(function(){
   $('.m-user-area').show(function(){
      $(this).animate({width:'170px'},50);
   });
   $('.overlay').fadeIn(100);
      
});
$('.overlay').click(function(){
    $('.mside').animate({width:'0px'},100,function(){
      $(this).hide();
    });
    $('.m-user-area').animate({width:'0px'},100,function(){
      $(this).hide();
    });
    $('.pop').fadeOut(200);
    
   $('.overlay').fadeOut(200);
});
$('#search-header').click(function(){
   $('#m-search').fadeIn(100);
});
$('#close').click(function(){
   $('#m-search').fadeOut(100);
});

$('#reg-fld').click(function(){
   name='register';
   localStorage.setItem("name", name);
   getloginforminfo(name);
});
$('#login-fld').click(function(){
   name='login';
   localStorage.setItem("name", name);
   getloginforminfo(name);
});

$('#login-btn').click(function(){
   name = 'login';
   localStorage.setItem("name", name);
   window.location.assign("../account-log");
});
$('#register-btn').click(function(){
   name = 'register';
   localStorage.setItem("name", name);
   window.location.assign("../account-log");
});
$('#redirect').click(function(){
   name='login';
   localStorage.setItem("name", name);
   getloginforminfo(name);
});



// AJAX /////////////////////////////////////////////////////

var video_div = $('#video-home');
var category_id = null;
var category = $('a[name="category"]');
   category.click(function(){
      category_id = $(this).attr('id');
   });
if(category_id != null){

}


category_form();




function category_form(){
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
      var myarr = JSON.parse(request.response); 
        
         sort_cat(myarr);
      }else {
      }

   }   
   request.open('POST', '../getalldata.php',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send();
}

function sort_cat(arr){
   var out = '<li onclick="display_videos(\'all\',\'all\')" name="category_li" id=""><a href="#" id="" data-id="catone" name="category">All</a></li>';
   for(var key in arr){
         out += '<li onclick="display_videos(null,'+arr[key].id+',0)" name="category_li" id="'+arr[key].id+'"><a href="#" id="'+arr[key].id+'" data-id="catone" name="category">'+arr[key].type+'</a></li>';
      }
      out += '<li><a href="../category"  name="category">Load more >></a></li>';
      $('#category-ul').html(out);
}


$('#search-mob').click(function(){

   var search = $('#msearch-input').val();
   display_videos(search,null,0);
   window.location.href = '../home';
   

});
$('#search-btn').click(function(){

   var search = $('#searchInput').val();
   display_videos(search,null,0);
   window.location.href = '../home';
   

});

$('#log-submit').click(function(){
   var q = $('#login-form').serialize();
   var url = 'action=login&'+q;
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
        // console.log(request.response);
         if(request.response == 1){
            window.location.replace('../home');
         }else {
            $('#message-log').show();
            $('#msg-login').html(request.response);
         }
      }
   }
   request.open('POST', '../login.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
});

$('#reg-submit').click(function(){

   var form = '';
   var username= '';
   var password=$('#password-reg');
   var confirmPassword = $('#conf-password-reg');
   if(password.val().length >= 8){

   if(password.val() != confirmPassword.val()){
      confirmPassword.css('border', '1px solid red');
      $('#password-match').html("Password doesn't match");
      $('#message-reg').css('display','block');
   }
   else{
   //var email ='';
   var action = $(this).attr('data-id');
   if(action == 'register'){
      var form = $('#register-form');
   }
   password = $('input[name=password-log]').val();
   
   var q = form.serialize();
   var url = 'action=register&'+q;
   
   var request= new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
         console.log(request.response);
         console.log(url);
         if(request.response == 1){
            var txt = 'Register Sucess redirect in 5 second';
            $('#message-reg').show(100);
            $('#message-reg').addClass('greenback');
            $('#password-match').html(txt);
            setTimeout(function(){ window.location = '../home'; }, 2000);
         }else {
            $('#message-reg').show(100);
            $('#password-match').html(request.response);
         }
      }
   }
   request.open('POST', '../login.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
 }
} else {
   $('#password-match').html("Password must be 8 character at least");
   $('#message-reg').css('display','block');
}
});

$('#change-password').click(function(){
   var old = $('input[name=old-password]').val();
   var newp = $('input[name=new-password]').val();
   var conf = $('input[name=confirm-password]').val();
   if(newp.length >= 8){
   if(newp == conf){
   var url = 'old='+old +'&new='+newp;
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
         var out = '';
         if(request.response == 1){
            $('#error-msg').addClass('greenback');
            out = '<p style="padding:6px;">Password change successfully</p>';
         }else{
            $('#error-msg').addClass('redback');
            out = '<p style="padding:6px;">you entered incorrect old password</p>';
         }
         $('#error-msg').html(out);
      }
    }
    request.open('POST','changepass.php?action=change&',true);
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    request.send(url);
   }else {
      var match = "Password doesn't match";
      $('#error-msg').addClass('redback');
      $('#error-msg').html('<p style="padding:6px;">'+match+'</p>');
   }
   }else {
      var match = "Password must be more than 8 character";
      $('#error-msg').addClass('redback');
      $('#error-msg').html('<p style="padding:6px;">'+match+'</p>');
   }
});


display_videos();
});

var pageactive;

function get_like(){
   console.log(userId);
   var url='userid='+userId;
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
         var myarr = JSON.parse(request.response);
         display_like(myarr);
      }
   }
   request.open('POST','getvideos.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
}
function display_like(arr){
   var out = '';
   //console.log(arr);
   for(var key in arr){
      out += '<a href="../video_player/index.php?id='+arr[key].id+'">\
      <div class="liked-div">\
      <div class="liked-video">\
      <img src="'+arr[key].img+'"></img>\
      </div>\
      <div class="info1">\
      <a class="link-dec" href="../video_player/index.php?id='+arr[key].id+'">'+arr[key].name+'</a>\
      <p>Views</p>\
      </div>\
      </div>\
      </a>';
   }
   $('#box3-a').html(out);

}

function get_favChannel(userid){
   if(userid != null){
      userId = userid;
   }
   console.log(userId);
   var url='userid='+userId;
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
      if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
         var myarr = JSON.parse(request.response);
         display_channel(myarr);
         console.log(myarr);
      }
   }
   request.open('POST','getchannel.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
}
function display_channel(arr){
   var out = '';
   //console.log(arr);
   for(var key in arr){
      out += '<a href="../channel/index.php?channel_id='+arr[key].id+'"><div class="block-display">\
            <div class="head-content">\
                  <img src="'+arr[key].imgPath+'"></img>\
            </div>\
            <div>\
               <a href="../channel/index.php?channel_id='+arr[key].id+'" class="link-dec">'+arr[key].name+'</a>\
            </div>\
         </div></a>';
   }
   $('#box2-a').html(out);

}

function display_videos(name,cat,page){
   var url = ' ';
   if(name != null){
      url += 'name='+name+'&';
   }
   if(cat != null){
      url += 'cat='+cat+'&';
   }
   if(page != null){
      url += 'page='+page+'&';
   }
   pageactive = page;
   
   //console.log(pageactive);
   //console.log(url);
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
    if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
      var myarr = JSON.parse(request.response);
      testfunction(myarr,pageactive,'home');

    }
   }
   request.open('POST', '../getvideodata.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);


}
function display_channel(channel,page){
   var url = ' ';   
   //console.log(pageactive);
   //console.log(url);
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
    if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
      var myarr = JSON.parse(request.response);
      testfunction(myarr,pageactive,'home');

    }
   }
   request.open('POST', 'getvideodata.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);


}
function testfunction(arr,page1,action){

   var page = arr.page.page;
   var first = 0;
   var last = page-1;
   var div;
   //console.log(page);
   if(action == 'home')
   {
      div = $("#video-home");
   }else {
      div = $("#video-channel")
   }
   var out = '<div class="videos-test">';
   var pageCounter = '<div class="counter"><a href="#" onclick="display_videos(null,null,'+first+')" class="page-num">&lt&lt</a>';
   //console.log(arr);
   for(var key in arr){
      if(!arr[key].page){
      out += '<div class="vidSpace" id="'+arr[key].id+'">\
   <div class="vid-div">\
      <div>\
         <a href="../video_player?contentId='+arr[key].id+'"><img src="'+arr[key].imgPath+'"></img></a>\
       </div>\
         <div class="vid-content">\
         <a href="../video_player?contentId='+arr[key].id+'">'+arr[key].name+'</a>\
         <div>\
         <span name="views">views : 198k</span>\
         <span name="rate">rate 98%</span>\
         </div>\
         </div>\
      </div>\
   </div>';
      }
   }
   out += '</div>';
   div.html(out);
   for(var i = 1; i<= page;i++){
      var pagent = i-1;
      if(page1 == pagent){
         pageCounter += '<a id="page-'+i+'" href="#" onclick="display_videos(null,null,'+pagent+')" class="page-num active">'+i+'</a>';
      } else if(page1 == null){
         if(i == 1){
            pageCounter += '<a id="page-'+i+'" href="#" onclick="display_videos(null,null,'+pagent+')" class="page-num active">'+i+'</a>';
         }else{
            pageCounter += '<a id="page-'+i+'" href="#" onclick="display_videos(null,null,'+pagent+')" class="page-num">'+i+'</a>';
         }
      }
      else {
      pageCounter += '<a id="page-'+i+'" href="#" onclick="display_videos(null,null,'+pagent+')" class="page-num">'+i+'</a>';
      }
   }

   pageCounter += '<a href="#" onclick="display_videos(null,null,'+last+')" class="page-num">&gt&gt</a></div>';
  $("#page-counter").html(pageCounter);

}

function changepassword(userid){

}
function show_related(){
   var id = 3016;
   var url = 'catId='+id;
   var request = new XMLHttpRequest();
   request.onreadystatechange = function(){
    if(request.readyState === XMLHttpRequest.DONE && request.status === 200){
      var myarr = JSON.parse(request.response);
      out = '';
      for(var key in myarr){
         out += '<a href="index.php?contentId='+myarr[key].id+'"><div class="vid-content">\
         <img src="'+myarr[key].imgPath+'"></img>\
         <span>'+myarr[key].name+'</span>\
         </div></a>';
      }
      $('#relate-vid').html(out);
    }
   }
   request.open('POST', 'getrelated.php?',true);
   request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
   request.send(url);
}



