<?php

function user_levels(){
	return [
            0 => 'SLB\'er',
            1 => 'Docent',
            2 => 'Student'
        ];
}

function module_types(){
	return [
            0 => 'Text',
            1 => 'Bestand',
            2 => 'Afbeelding',
            3 => 'Video',
            4 => 'Project'
        ];
}

function render_module($module){
    if ($module->type == 0) {
        $result = "<div>";
            $result .= "<h3>" . $module->title . " <a class=\"btn btn-default pull-right\" href=\"". url('modules/' . $module->id) . "\" role=\"button\">Module bewerken</a></h3>";
            $result .= "<p>" . $module->description . "</p>";
        $result .= "</div>";
        return $result;
    } else {
        return "Onbekende module type";
    }
}