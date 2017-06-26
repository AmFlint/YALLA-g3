var lis = document.querySelectorAll(".tagColor");
var input = document.querySelector('#inputColor');
var colorful = document.querySelector('.colorful');

for (var j = 0; j < lis.length; j++)
{
    lis[j].addEventListener('click', function () {
        var li = this.classList[1];
        var color = li.split('_')[1];
        input.setAttribute('value', color);
        colorful.className = 'tagColor border colorful ' + 'tag_' + color;
    });
}