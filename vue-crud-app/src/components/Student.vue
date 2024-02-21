<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">Vue CRUD (Create Read Update Delete)</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h3>Add Record</h3>
                <div class="card-body">
                    <form @submit.prevent="save">
                        <div class="form-group">
                            <label>Student name</label>
                            <input type="text" v-model="student.name" class="form-control" placeholder="Student name" />
                        </div>
                        <div class="form-group">
                            <label>Student Address</label>
                            <input type="text" v-model="student.detail" class="form-control" placeholder="Student Address" />
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Student List</h2>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in result" v-bind-key="student.id">
                            <td>{{ student.id }}</td>
                            <td>{{ student.name }}</td>
                            <td>{{ student.detail }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" @click="edit(student)">Edit</button>
                                <button type="button" class="btn btn-danger" @click="remove(student)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'Student',
    data() {
        return {
            result: {},
            student: {
                id: '',
                name: '',
                detail: ''
            }
        }
    },
    created() {
        this.StudentLoad();
    },
    mounted() {
        console.log("mounted() called.......");
    },
    methods: {
        StudentLoad() {
            var page = "http://vue_js_crud.test/api/student";
            axios.get(page)
                .then(
                    ({ data }) => {
                        this.result = data;
                    }
                )
        },
        save()
        {
            if(this.student.id == '')
            {
                this.saveData();
            }else
            {
                this.updateData();
            }
        },
        saveData()
        {
            axios.post("http://vue_js_crud.test/api/student", this.student)
            .then(
                ({data}) => {
                    alert("saved");
                    this.StudentLoad();
                    this.student.name = '';
                    this.student.detail = '';
                    this.id = '';
                }
            )
        },
        edit(student)
        {
            this.student = student;
        },
        updateData()
        {
            var editrecords = "http://vue_js_crud.test/api/student/" + this.student.id;
            {
            axios.put(editrecords, this.student)
            .then(
                ({data}) => {
                    this.student.name = '';
                    this.student.detail = '';
                    this.id = '';
                    this.StudentLoad();
                    alert("updated");
                }
            )
            }
        },
        remove(student)
        {
            var url = `http://vue_js_crud.test/api/student/${student.id}`;
            axios.delete(url);
            alert("deleted");
            this.StudentLoad();
        }
    }
}
</script>