{include file="header.tpl"}

{include file="form-alta.tpl"}

<!-- lista de tareas -->
<ul class="list-group">
    {foreach from=$tasks item=$task}
        <li class='
                list-group-item d-flex justify-content-between align-items-center
                {if $task->finalizada} finalizada {/if}
            '>
            <span> <b>{$task->titulo}</b> - {$task->descripcion|truncate:25} (prioridad {$task->prioridad}) </span>
            <div class="ml-auto">
                {if !$task->finalizada}
                    <a href='finalize/{$task->id}' type='button' class='btn btn-success'>Finalizar</a>
                {/if}
                <a href='delete/{$task->id}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} tareas</small></p>

{include file="footer.tpl"}