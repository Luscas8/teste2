document.getElementById('taskForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const taskInput = document.getElementById('taskInput').value;

    fetch('backend/tasks.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'task=' + encodeURIComponent(taskInput)
    })
    .then(response => response.text())
    .then(result => {
        console.log(result);
        loadTasks(); // Atualiza a lista de tarefas após adicionar
    });

    document.getElementById('taskInput').value = ''; // Limpa o campo
});

function loadTasks() {
    fetch('backend/tasks.php', { method: 'GET' })
    .then(response => response.json())
    .then(tasks => {
        const taskList = document.getElementById('taskList');
        taskList.innerHTML = '';

        tasks.forEach(task => {
            const li = document.createElement('li');
            li.textContent = task.task;
            taskList.appendChild(li);
        });
    });
}

loadTasks(); // Carrega as tarefas ao abrir a página
