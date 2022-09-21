import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

console.log(Editor, 'test')

var editor = new Editor({
    el: document.querySelector('#editor'),
    previewStyle: 'vertical',
    height: '500px',
    initialValue: '# Example Content'
});

editor.getMarkdown();