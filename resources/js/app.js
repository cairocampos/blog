const Swal = require("sweetalert2");

const select = el => document.querySelector(el);
const selectAll = el => document.querySelectorAll(el);

class EventClass {
    constructor(el) {
        this.element = document.querySelectorAll(el);
    }

    add(event, callback) {
        return this.element.forEach(element => {
            element.addEventListener(event, callback)
        });
    }
}

function Event(element) {
    return new EventClass(element)
}

const Helpers = {
    error(error) {
        Swal.fire({
            title: "Error",
            icon:"error",
            text:error.statusText
        });
    },
    confirm(title,callback) {
        Swal.fire({
            title,
            icon:"question",
            showCancelButton:true,
            confirmButtonText: "Confirm",
            denyButtonText:"Cancel" 
        }).then(callback);
    },
    request(method, url, params = {}) {
        return new Promise((resolve, reject) => {
            let options = {method};
            if(method.toUpperCase() != "GET" && Object.keys(params).length) {
                options.body = JSON.stringify(params);
            }

            fetch(url, {
                headers: {
                    "X-CSRF-TOKEN": select('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type":"application/json",
                    "Accept":"application/json",
                },
                credentials:"include",
                ...options
            })
            .then(res => {
                if(res.ok) {
                    return res.json()
                }

                return reject(res)
            })
            .then(data => resolve(data))
            .catch(err => reject(err));
        });
    }
}


const User = {
    async delete(id) {
        try {
            const data = await Helpers.request("DELETE", `/posts/${id}`);
            select(`.table__posts tr[id="${id}"]`).remove();

        } catch (error) {
            Helpers.error(error)
        }
    }
}

const App = {

    events() {
        Event(".btn-remove__post").add("click", function({currentTarget}) {
            const id = currentTarget.getAttribute("id");
            
            Helpers.confirm("Deseja remover esse Post ?", function(e){
                if(e.isConfirmed) {
                    User.delete(id);
                }
            });

        });
    }
};

window.onload = () => App.events();