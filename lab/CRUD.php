<?php
$dataFile = "data.json";
if(!file_exists($dataFile)) file_put_contents($dataFile,"[]");

if(isset($_POST["action"])){
    $data = json_decode(file_get_contents($dataFile),true);

    if($_POST["action"]=="create"){
        $data[]=["id"=>time(),"name"=>$_POST["name"]];
        file_put_contents($dataFile,json_encode($data));
        exit;
    }

    if($_POST["action"]=="read"){
        echo json_encode($data);
        exit;
    }

    if($_POST["action"]=="update"){
        foreach($data as &$d){
            if($d["id"]==$_POST["id"]) $d["name"]=$_POST["name"];
        }
        file_put_contents($dataFile,json_encode($data));
        exit;
    }

    if($_POST["action"]=="delete"){
        $data=array_values(array_filter($data,function($d){
            return $d["id"]!=$_POST["id"];
        }));
        file_put_contents($dataFile,json_encode($data));
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>AJAX CRUD</title>
<style>
body{font-family:Arial;background:#f2f2f2}
.container{width:400px;margin:40px auto;background:white;padding:20px}
input,button{width:100%;padding:10px;margin:5px 0}
table{width:100%;margin-top:10px}
td{padding:5px}
button{background:#ff5c8a;color:white;border:none}
</style>
</head>
<body>

<div class="container">
<h2>AJAX CRUD</h2>
<input type="hidden" id="id">
<input type="text" id="name" placeholder="Enter Name">
<button onclick="save()">Save</button>

<table id="table"></table>
</div>

<script>
function load(){
    fetch("index.php",{method:"POST",body:new URLSearchParams({action:"read"})})
    .then(res=>res.json())
    .then(data=>{
        let html="";
        data.forEach(d=>{
            html+=`<tr>
            <td>${d.name}</td>
            <td><button onclick="edit(${d.id},'${d.name}')">Edit</button></td>
            <td><button onclick="del(${d.id})">Delete</button></td>
            </tr>`;
        });
        document.getElementById("table").innerHTML=html;
    });
}

function save(){
    let id=document.getElementById("id").value;
    let name=document.getElementById("name").value;
    let action=id==""?"create":"update";
    fetch("index.php",{method:"POST",body:new URLSearchParams({action:action,id:id,name:name})})
    .then(()=>{clear();load();});
}

function edit(id,name){
    document.getElementById("id").value=id;
    document.getElementById("name").value=name;
}

function del(id){
    fetch("index.php",{method:"POST",body:new URLSearchParams({action:"delete",id:id})})
    .then(()=>load());
}

function clear(){
    document.getElementById("id").value="";
    document.getElementById("name").value="";
}

load();
</script>

</body>
</html>
