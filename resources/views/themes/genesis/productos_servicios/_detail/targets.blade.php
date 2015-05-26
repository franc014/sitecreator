<?php
$targets = $data["targets"];
?>
@if(!$targets->isEmpty())
<div class="targets-container" >
    <div class="targets-content">

        <h1 class="content-intro secondary-intro " ><span data-icon="&#xe6b3">Ideal para:</span></h1>
        <ul class="list-unstyled">
            @foreach($targets as $target)
            <li>
                <span data-icon="&#xe710" ></span>
                    {{$target->detail}}

            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif