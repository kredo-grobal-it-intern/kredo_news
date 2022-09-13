import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

console.log(Editor, 'test')

const editor = new Editor({
    el: document.querySelector('#editor'),
    previewStyle: 'vertical',
    height: '500px',
    initialValue: '# Example Content'
});

editor.getMarkdown();