
//performs operations on the view
var View = function () {
    console.log("3")
    this.tags_tmpl = $('#tags_tmpl');
    this.tag_conainer = $('#tags');
    this.projects_container = $('#projects');
    this.project_tmpl = $('#project_tmpl');
    this.filter = $('#filter');
    this.tagall = $('#tagall');
    this.tagpull = $('#tagpull')
    this.init();
};
View.prototype.init = function () {

};
View.prototype.changeActivTag = function () {
    $('#content a.tec.activ').removeClass("activ");
    var _hash = window.location.hash.replace(/^#/, '');
    if (_hash.length > 0)
        $('#content a.tec.' + window.location.hash.replace(/^#/, '')).addClass("activ");
    else
        $('#content a.tec').addClass("activ");
};

//change pull bottom visibility
View.prototype.changeAllBtnState = function () {
    var _hash_length = window.location.hash.replace(/^#/, '').length;
    if (this.tagall.is(':hidden') && _hash_length > 0)
        this.tagall.css("display", "block");
    if (!this.tagall.is(':hidden') && _hash_length == 0) {
        this.tagall.css("display", "hidden");
    }
};

View.prototype.changeTagPullState = function (event) {
    if (event) event.preventDefault();

    if ($(this.filter).is(':hidden'))
        $(this.tagpull).text("Tags <<")
    else
        $(this.tagpull).text("Tags >>")

    $(this.filter).slideToggle();
};

View.prototype.removeProjects = function () {
    $(".project").remove();
};
View.prototype.addProjects = function (result) {
    var text = this.project_tmpl.jqote(result);

    this.projects_container.append(text.replace(/\[\[(.+?)\]\]/g, function (mtch, val) {
        return "<a class='tec " + encodeTag(val) + "' href='projects.php?l=" + $.urlParam('l') + "#" + encodeTag(val) + "'>" + val + "</a>";
    }));
};