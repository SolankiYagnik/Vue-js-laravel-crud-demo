<p align="center"><a href="https://laravel.com" target="_blank">
    <img src="https://github.com/SolankiYagnik/Vue-js-laravel-crud-demo/assets/88535982/5d616159-b66f-4a02-aec0-3c2ab455a3df" width="400" alt="Laravel + Vue CRUD"></a>
</p>

## How To Create Laravel 10 With Vue JS CRUD Operation

In this article, we will see how to create laravel 10 with vue js crud operation. Here, we will learn to create crud operation in laravel 10 vue JS. You can learn to create, read, update and delete operations with a single page application (SPA) in the vue and vue router. So, you can create crud operation without page refresh in laravel 10 using vue 3.

So, let's see the laravel 10 vue js crud, vue js crud example in laravel 9 and laravel 10 step by step, laravel 10 vue js crud example, and laravel 10 vue 3 crud operation.

Vue comes pre-packaged with Laravel (Laravel Mix, an excellent build tool based on webpack) and allows developers to start building complex single-page applications.

So, let's see the CRUD operation in laravel 9/10 using vue js.

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 1: Install Laravel 10</strong></div>

In this step, we will install the laravel 10 application using the following command.

<pre><code class="language-php hljs">composer create-project --prefer-dist laravel/laravel vue_js_CRUD</code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 2: Configure Database</strong></div>
Now, we will set up the database configuration in the .env file.
<pre><code class="language-php hljs">DB_CONNECTION=mysql 
DB_HOST=<span class="hljs-number">127.0</span><span class="hljs-number">.0</span><span class="hljs-number">.1</span> 
DB_PORT=<span class="hljs-number">3306</span> 
DB_DATABASE=laravel_10_vue_js_crud_operation
DB_USERNAME=root
DB_PASSWORD=root</code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 3: Install Vue</strong></div>
Run the following command and install the veu and npm package.

<pre><code class="language-php hljs">npm create vue@latest</code></pre>
After that, we will install vue, vue-router, and vue-axios. Vue-axios will be used for calling Laravel backend API.

<pre><code class="language-php hljs">
cd <your-project-name>
npm install
npm run dev
</code>
</pre>

<pre><code class="language-php hljs">npm run build</code></pre>

## You can use Vue directly from a CDN via a script tag:

<pre><code><span class="line"><span style="color:#E1E4E8;">&lt;</span><span style="color:#85E89D;">script</span><span style="color:#B392F0;"> src</span><span style="color:#E1E4E8;">=</span><span style="color:#9ECBFF;">"https://unpkg.com/vue@3/dist/vue.global.js"</span><span style="color:#E1E4E8;">&gt;&lt;/</span><span style="color:#85E89D;">script</span><span style="color:#E1E4E8;">&gt;</span></span></code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 4: Create Migration</strong></div>
Now, we will create a migration, model, and controller using the following command. -mcr command creates migration, model, and controller in a single command.
<pre><code class="language-php hljs">php artisan make:model Student -mcr</code></pre>

Migration:

<pre><code class="language-php hljs"><span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Database</span>\<span class="hljs-title">Schema</span>\<span class="hljs-title">Blueprint</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Database</span>\<span class="hljs-title">Migrations</span>\<span class="hljs-title">Migration</span>;

<span class="hljs-class"><span class="hljs-keyword">return</span> <span class="hljs-title">new class</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Migration</span>
</span>{

    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">up</span><span class="hljs-params">()</span>
    </span>{
        Schema::create(<span class="hljs-string">'students'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Blueprint $table)</span> </span>{
            $table-&gt;increments(<span class="hljs-string">'id'</span>);
            $table-&gt;string(<span class="hljs-string">'name'</span>);
            $table-&gt;text(<span class="hljs-string">'detail'</span>);
            $table-&gt;timestamps();
        });
    }


    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">down</span><span class="hljs-params">()</span>
    </span>{
        Schema::drop(<span class="hljs-string">"students"</span>);
    }
}</code></pre>

After that, migrate the table to the database using the following command.
<pre><code class="language-php hljs">php artisan migrate</code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 5: Create Controller and Model</strong></div>
In this step, we will update the Student.php model.
## app/Models/Student.php

<pre><code class="language-php hljs"><span class="hljs-meta">&lt;?php</span>

<span class="hljs-keyword">namespace</span> <span class="hljs-title">App</span>\<span class="hljs-title">Models</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Database</span>\<span class="hljs-title">Eloquent</span>\<span class="hljs-title">Factories</span>\<span class="hljs-title">HasFactory</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Database</span>\<span class="hljs-title">Eloquent</span>\<span class="hljs-title">Model</span>;

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">Student</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Model</span> </span>{

   <span class="hljs-keyword">use</span> <span class="hljs-title">HasFactory</span>;

   <span class="hljs-keyword">protected</span> $fillable = [<span class="hljs-string">'name'</span>,<span class="hljs-string">'detail'</span>];

}

<span class="hljs-meta">?&gt;</span></code></pre>

<p>Now, we will update the&nbsp;<strong>StudentController.php</strong>&nbsp;file.</p>

<strong>app/Http/Controllers/StudentController.php</strong>

<pre><code class="language-php hljs"><span class="hljs-meta">&lt;?php</span>

<span class="hljs-keyword">namespace</span> <span class="hljs-title">App</span>\<span class="hljs-title">Http</span>\<span class="hljs-title">Controllers</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">App</span>\<span class="hljs-title">Models</span>\<span class="hljs-title">Student</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Http</span>\<span class="hljs-title">Request</span>;

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">StudentController</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Controller</span>
</span>{
    <span class="hljs-comment">/**
     * Display a listing of the resource.
     *
     * <span class="hljs-doctag">@return</span> \Illuminate\Http\Response
     */</span>
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">index</span><span class="hljs-params">()</span>
    </span>{
        $$students = Student::all();
        <span class="hljs-keyword">return</span> response()-&gt;json($students);
    }

    <span class="hljs-comment">/**
     * Store a newly created resource in storage.
     *
     * <span class="hljs-doctag">@param</span>  \Illuminate\Http\Request  $request
     * <span class="hljs-doctag">@return</span> \Illuminate\Http\Response
     */</span>
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">store</span><span class="hljs-params">(Request $request)</span>
    </span>{
        return Student::create($request->all());
    }

    <span class="hljs-comment">/**
     * Display the specified resource.
     *
     * <span class="hljs-doctag">@param</span>  \App\Models\Student  $student
     * <span class="hljs-doctag">@return</span> \Illuminate\Http\Response
     */</span>
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">show</span><span class="hljs-params">(Student $student)</span>
    </span>{
        <span class="hljs-keyword">return</span> Student::find($id);
    }

    <span class="hljs-comment">/**
     * Update the specified resource in storage.
     *
     * <span class="hljs-doctag">@param</span>  \Illuminate\Http\Request  $request
     * <span class="hljs-doctag">@param</span>  \App\Models\Student  $student
     * <span class="hljs-doctag">@return</span> \Illuminate\Http\Response
     */</span>
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">update</span><span class="hljs-params">(Request $request, Student $student, $id)</span>
    </span>{
        $student = Student::find($id);
        $student-&gt;update($request->all());
        return $student;
    }

    <span class="hljs-comment">/**
     * Remove the specified resource from storage.
     *
     * <span class="hljs-doctag">@param</span>  \App\Models\Student  $student
     * <span class="hljs-doctag">@return</span> \Illuminate\Http\Response
     */</span>
    <span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">destroy</span><span class="hljs-params">(Student $student)</span>
    </span>{
        $student = Student::find($id);
        $student->delete();
        <span class="hljs-keyword">return</span> $student;
    }
}</code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 6: Add Routes</strong></div>
Now, we will add routes in the web.php and api.php. So, add the below route in the routes files.

## routes/web.php

<pre><code class="language-php hljs"><span class="hljs-meta">&lt;?php</span>
 
Route::get(<span class="hljs-string">'{any}'</span>, <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">()</span> </span>{
    <span class="hljs-keyword">return</span> view(<span class="hljs-string">'layout.app'</span>);
})-&gt;where(<span class="hljs-string">'any'</span>, <span class="hljs-string">'.*'</span>);</code></pre>

Route::resource('student', StudentController::class);
## routes/api.php

<pre><code class="language-html hljs xml"><span class="php"><span class="hljs-meta">&lt;?php</span>
 
Route::resource(<span class="hljs-string">'student'</span>,App\Http\Controllers\StudentController::class);</span></code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 7: Create Vue App</strong></div>
<p>In this step, we will create an&nbsp;<strong>app.blade.php</strong> file. So, add the following code to that file.</p>
<strong>resource/views/layout/app.blade.php</strong>

<pre><code class="language-html hljs xml"><span class="hljs-meta">&lt;!doctype html&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">html</span> <span class="hljs-attr">lang</span>=<span class="hljs-string">"{{ str_replace('_', '-', app()-&gt;getLocale()) }}"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">head</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">meta</span> <span class="hljs-attr">charset</span>=<span class="hljs-string">"utf-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">meta</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"viewport"</span> <span class="hljs-attr">content</span>=<span class="hljs-string">"width=device-width, initial-scale=1"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">meta</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"csrf-token"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"{{ csrf_token() }}"</span>/&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">title</span>&gt;</span>Vue JS CRUD Operations in Laravel<span class="hljs-tag">&lt;/<span class="hljs-name">title</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"https://fonts.googleapis.com/css?family=Nunito:200,600"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">crossorigin</span>=<span class="hljs-string">"anonymous"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"{{ mix('css/app.css') }}"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span>/&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">head</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">body</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"app"</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"{{ mix('js/app.js') }}"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/javascript"</span>&gt;</span><span class="undefined"></span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">body</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">html</span>&gt;</span></code></pre>

<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 8: Create Vue Component</strong></div>

<p>In this step, we will create a vue component in the <strong>components</strong>&nbsp;folder in the <strong>resource/js&nbsp;</strong>folder.</p>
<p>View app</p>
<p>App.vue</p>
<p>Student.vue</p>

<p><strong>App.vue&nbsp;</strong>is the main file of our Vue app. We will define&nbsp;<strong>router-view&nbsp;</strong>in that file. All the routes will be shown in&nbsp;<strong>App.vue&nbsp;</strong>file.</p>

<p>After that, open <strong>App.vue</strong> file and Update the following code into that file.</p>


<pre><code class="language-html hljs xml"><script setup>import Student from './components/Student.vue'</script><span class="hljs-tag">&lt;<span class="hljs-name">template</span>&gt;</span><span class="hljs-tag">&lt;<span class="hljs-name">Student</span>/&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">template</span>&gt;</span></code></pre>

<strong>Student.vue&nbsp;</strong>file.</p>

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


<div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;"><strong>Step 12: Run Laravel Application</strong></div>
In this step, we will run the laravel 10 vue 3 crud operation application using the following command.
<pre><code class="hljs coffeescript"><span class="hljs-built_in">npm</span> run dev</code></pre>
