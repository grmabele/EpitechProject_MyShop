<template>
  <div class="note" >
        <h2>{{title}}</h2>
        <p contenteditable="true">{{content}}</p>
  </div>
</template>
<script>
export default {
  mounted(){
  console.log(this.$route);
    this.notes = JSON.parse(localStorage.getItem('notes'));
    let identifiedNote = this.notes.find(note => note._id === this.id);
    console.log("note::: ", identifiedNote);
    this.content = identifiedNote.content;

},
  data() {
    return {
      id: this.$route.query.id,
      content: this.content,

    }
  },
  methods: {

  },
}

</script>
