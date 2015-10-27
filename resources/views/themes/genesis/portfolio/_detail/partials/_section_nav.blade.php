<?php
$gallery = $project->gallery_images;
$numberRestOfProjects = $data['restofprojects'];
?>
<ul class="nav nav-pills pull-right section-nav">
    @if(!$gallery->isEmpty())
        <li role="presentation" class="active section-list-nav"><a data-icon="&#xe60e"
                                                                   href="#project-gallery">Galería</a></li>
    @endif
    @if(!$numberRestOfProjects->isEmpty())
        <li role="presentation" class="active section-list-nav"><a data-icon="&#xe6aa" href="#other-projects">Otros
                proyectos</a>
        </li>
    @endif
</ul>