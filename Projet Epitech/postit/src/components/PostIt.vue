<template>
  <div class="hello">
    <div class="postit" @click="isSelected">
      <input  type="text" class=topBar maxlength="20" v-model="myTitle" @keyup="submitData"/>
      <form class=form @submit.prevent="submitData">
        <div contenteditable class=textAria>

          <textarea rows="9" v-model="myText" class="noselect" maxlength="100" @keyup="submitData"></textarea>

        </div>
        <div class=bottomBar>
          <button  @click="toggleDetails(id)" alt="show details" style="border: none; background: dodgerblue; outline: none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M13.22 19.03a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06l-6.25-6.25a.75.75 0 10-1.06 1.06l4.97 4.97H3.75a.75.75 0 000 1.5h14.44l-4.97 4.97a.75.75 0 000 1.06z"></path></svg>
            </button>
          <div v-if="detailAreVisible" >

          </div>
        </div>
      </form>


    </div>

  </div>
</template>

<script>
export default {
  name: 'post-it',
  props: {
    id: {
      type: String,
      required: true,
    },
    content: {
      type: String,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    showDetails: {
      type: Boolean,
      required: false,
      default: false,
    }
  },
  emits: {
    'update-note': (id, text, title) =>{
      return id, text, title;
    },
    'is-selected': (id)=>{
      if(id) {
        return true;
      }else{
        console.warn('Id is missing!');
        return false;
      }
    }
  },
  data() {
    return {
      detailAreVisible: false,
      myText: this.content,
      myTitle: this.title,
    }
  },
  methods: {
    toggleDetails() {
      this.detailAreVisible = !this.detailAreVisible;
      this.$router.push({path: '/note' , query: {id: this.id, title: this.title}})
      //this.$router.push({name: 'newLocation', params: { foo: "bar"}});
    },
    isSelected() {
      this.$emit('is-selected', this.id);
    },
    submitData(){
      this.$emit('update-note', this.id, this.myText, this.myTitle);
    }
  }
}
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

</style>


// Post-it style
<style>
@import url(https://fonts.googleapis.com/css?family=Lato);
@import url(https://fonts.googleapis.com/css2?family=Handlee&display=swap);
body {
  background-color: #ecf0f1;
}
input{
  text-align: center;
}
.topBar {
  z-index: 1;
  width: 200px;
  height: 40px;
  border: none;
  outline: none;
  background: linear-gradient(
      180deg
      , #fee250 -2%, #fcde4a 100%);
  font-family: AnjaliOldLipi;
  font-size: 1.2em;
}

.bottomBar {
  z-index: 1;

  width: 200px;
  height: 40px;

}

.form {

  width: 200px;
  height: 169px;

}
textarea  {

  background: linear-gradient( 180deg, #fcde4a -11%, rgba(266,210,44,0.9640231092436975) 100%);
  border: none;
  width: 107%;
  height: inherit;
  resize: none;
  font-family: 'Handlee', cursive;
  font-size: 1.2em;
  margin: 5px;
}
.noselect {
  cursor: default;
  -webkit-user-select: none;
  -webkit-touch-callout: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
}

.noselect:focus {
  outline: none;
}
.textAria {

  width: 180px;
  height: 140px;
  font-family: 'Lato', sans-serif;
  overflow: hide;
}

.textAria:focus {
  outline: 0;
}

.postit{

background: linear-gradient(180deg, #fee250 -11%, rgb(255 212 47) 100%);
box-shadow: 0px 5px 7px rgb(33 33 33 / 49%);
  border-bottom-right-radius: 40px 5px;
}
</style>