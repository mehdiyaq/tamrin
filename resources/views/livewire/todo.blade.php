<div class="w-full h-screen flex items-center justify-center">

    <div class="w-6/12 mx-auto">

        <div class="flex items-center justify-between space-x-4">
            <div class="flex w-full items-center relative">
                <input type="text" name="todo" id="addtodo"
                       class="p-2 border w-11/12 focus:outline-none outline-none shadow-none">
                <button type="submit" class="w-1/12 h-full absolute top-0 right-0 bg-red-200 focus:outline-none">+
                </button>
            </div>
            <div class="">
                <select name="" id="">
                    <option value="all">All</option>
                    <option value="done">Done</option>
                    <option value="not">unfinished</option>
                </select>
            </div>
        </div>


        <div id="inja"></div>

    </div>

</div>


<script>

    const search = document.querySelector('#addtodo');
    const todo = document.querySelector('#todo');
    const btn = document.querySelector('button');

    const inja = document.querySelector('#inja');




    btn.addEventListener('click', e => {
        e.preventDefault();
        const result = document.createElement('div');
        result.classList.add('result');

        const todo_r = document.createElement('div');
        todo_r.classList.add('todo_r');


        inja.append(result);
        result.append(todo_r);
        todo_r.innerHTML = search.value;

        saveTodo(search.value);

        const ok_r = document.createElement('button');
        ok_r.innerHTML = "OK";
        ok_r.classList.add('ok_r');
        const del_r = document.createElement('button');
        del_r.classList.add('del_r');
        del_r.innerHTML = "DELETE";
        result.append(ok_r);
        result.append(del_r);


        ok_r.addEventListener('click', () => {
            todo_r.classList.toggle('completed');
        });

        del_r.addEventListener('click', () => {
            result.remove();
        });

search.value = "";

    });

function saveTodo(todo){
    let todos;

    if(localStorage.getItem('todos') === null){
        todos = [];

    }else {
        todos = JSON.parse(localStorage.getItem('todos'));
    }

    todos.push(todo);
    localStorage.setItem('todos', JSON.stringify(todos));
}


function getTodos(todo){
    let todos;

    if(localStorage.getItem('todos') === null){

    }
}
</script>
