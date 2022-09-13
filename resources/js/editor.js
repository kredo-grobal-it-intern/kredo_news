import Editor from '@toast-ui/editor'
// const Editor = require('@toast-ui/editor');
// const Editor = toastui.Editor;
import '@toast-ui/editor/dist/toastui-editor.css';

console.log(Editor, 'test')

const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    initialEditType: 'markdown'
});

editor.getMarkdown();