

const app = new (function(){
    this.tbody = document.getElementById("tbody");
    this.id = document.getElementById("id");
    this.nombres = document.getElementById("nombres");
    this.email = document.getElementById("email");
    this.edad = document.getElementById("edad");

    this.myList = ()=>{
        fetch("../controllers/list.php")
        .then((res) => res.json())
        .then((data)=>{
            //console.log(data);
            this.tbody.innerHTML = "";
            data.forEach((element) => {
                this.tbody.innerHTML+= `
                    <tr>
                        <td>${element.person_id}</td>
                        <td>${element.person_name}</td>
                        <td>${element.person_email}</td>
                        <td>${element.person_age}</td>
                       
                        <td>
                            <a href = "javascript:;" class = "btn btn-warning btn-sm" onclick = "app.editar(${element.person_id})">Edit</a>
                            <a href = "javascript:;" class = "btn btn-danger btn-sm" onclick = "app.delete(${element.person_id})">Delete</a>
                        </td>

                    </tr>
                `;
            });
        })
        .catch((error)=>console.log(error));
    };
    this.guardar = ()=>{
        var form = new FormData();
        form.append("nombres", this.nombres.value);
        form.append("email", this.email.value);
        form.append("edad", this.edad.value);
        form.append("id", this.id.value);
        if(this.id.value === ""){
            fetch("../controllers/save.php",{
                method: "POST",
                body: form,
            })
            .then((res)=>res.json())
            .then((data)=>{
                alert("creado exitosamente");
                this.clear();
                this.myList();
            })
            .catch((error)=>console.log(error));
        }else{
            fetch("../controllers/actualizar.php",{
                method: "POST",
                body: form,
            })
            .then((res)=>res.json())
            .then((data)=>{
                //alert("actualizado exitosamente");
                this.clear();
                this.myList();
            })
            .catch((error)=>console.log(error));
        }
    
    };
    this.delete = (id) => {
        var form = new FormData();
        form.append("id", id);
        fetch("../controllers/delete.php", {
            method :"POST",
            body: form,
        })
            .then((res) => res.json())
            .then((data)=>{
                alert("eliminado exitosamente");
                this.myList();
            })
            .catch((error)=>console.log(error));

    }
    this.editar=(id)=>{
        var form = new FormData();
        form.append("id", id);
        fetch("../controllers/editar.php",{
            method: "POST",
            body: form,
        })
        .then((res)=>res.json())
        .then((data)=>{
            this.id.value = data.person_id;
            this.nombres.value = data.person_name;
            this.email.value = data.person_email;
            this.edad.value = data.person_age;
           // alert("actualizado exitosamente");
            //this.clear();
            //this.myList();
        })
        .catch((error)=>console.log(error));
    }
    this.clear = () => {
        this.id.value = "";
        this.nombres.value = "";
        this.email.value = "";
        this.edad.value = "";

    }
})();
app.myList();