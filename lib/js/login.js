let username=document.getElementById("username");
let password=document.getElementById("password");
let button=document.getElementById("button");
let tip=document.getElementById("tip");


//ajax验证账号密码
button.onclick=function(){
let xhr=new XMLHttpRequest();
xhr.open("POST","check.php",true);//JS文件的相对位置以引用他的html为准
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.onreadystatechange=function () {
        if(xhr.readyState===4&&xhr.status===200) {
            if(!xhr.responseText){
                //账号密码错误
                //console.log("123");
                tip.innerHTML="账号密码都给忘了，憨批^^";
            }
            else {
                console.log(xhr.responseText);
                window.location.href=xhr.responseText;
            }

        }
    };

xhr.send("username="+username.value+"&password="+password.value);
};