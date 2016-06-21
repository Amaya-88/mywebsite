console.log("1")
//encode project tag to avoid incompatibility problems
function encodeTag(tag) {
    return tag.replace(/#$/, '_sharp').replace(/([ ])/g, '__').replace(/\./, '_dot_');
}
function decodeTag(tag) {
    return tag.replace(/_sharp$/, '#').replace(/(__)/g, ' ').replace(/\_dot_/, '.');
}


var view = new View();
$(document).ready(docLoad);
function docLoad() {
    console.log("docload")

    var project = new Project();
    loadProjectTag(project)
    loadProject(project);

    initHandlers();
}

function loadProjectTag(project) {
    project.loadProjectTags(
        function function_callback(result) {
            var text = view.tags_tmpl.jqote(result);
            view.filter.append(text);
        }
    );
}

function loadProject(project) {
    project.loadProjects(
        decodeTag(window.location.hash.replace(/^#/, '')),
        $.urlParam("l"),
        function function_callback(result) {
            view.addProjects(result);
            view.changeActivTag();
            view.changeAllBtnState();
        }
  );

}

function initHandlers() {

    $(tagpull).on('click', view.changeTagPullState.bind(this));

    /*$(window).resize(function(){  
        var w = $(window).width();  
        if(w > 320 && view.filter.is(':hidden')) {  
            menu.removeAttr('style');  
        }  
    });*/

    //change project when hash changes
    if (("onhashchange" in window) && !(navigator.userAgent.match(/MSIE [67]\./))) {

        //modern browsers 
        $(window).bind('hashchange', function () {
            view.removeProjects();
            var project = new Project();
            loadProject(project);
        });

    } else {
        //IE and browsers that don't support hashchange
        $('a.tec').bind('click', function () {
            view.removeProjects();
            var project = new Project();
            loadProject(project);
        });
    }
}
