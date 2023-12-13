<template>

  <div class="home">
    <button @click="newNote" style="outline: none; border: none">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path
            d="M12.75 7.75a.75.75 0 00-1.5 0v3.5h-3.5a.75.75 0 000 1.5h3.5v3.5a.75.75 0 001.5 0v-3.5h3.5a.75.75 0 000-1.5h-3.5v-3.5z"></path>
        <path fill-rule="evenodd"
              d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path>
      </svg>
    </button>
    <post-it
        v-for="n in notes"
        :key="n._id"
        :id="n._id"
        :content="n.content"
        :title="n.title"
        :show-details="false"
        @update-note="updateNote"
        @is-selected="isSelected"
    />

  </div>

</template>

<script>
// @ is an alias to /src
import PostIt from "@/components/PostIt";
//import ShowDetail from "@/components/ShowDetail";

export default {
  name: 'Home',
  data() {
    return {
      notes: [],
    }
  },
  components: {
    PostIt,
  },
  created() {
    // GET request using fetch with error handling
    fetch("http://5.135.119.239:3090/notes")
        .then(async response => {
          const data = await response.json();

          // check for error response
          if (!response.ok) {
            // get error message from body or default to response statusText
            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
          }
          console.log("data: ", data);
          this.notes = data.notes;

          console.log(this.notes);
        })
        .catch(error => {
          this.errorMessage = error;
          console.error("There was an error!", error);
        });
  },
  mounted() {
    if (localStorage.getItem('notes')) {
      try {
        this.notes = JSON.parse(localStorage.getItem('notes'));
      } catch (e) {
        localStorage.removeItem('notes');
      }
    }
  },
  methods: {
    addPostIt() {
      console.log("add a postit");
    },
    updateNote(id, text, title) {
      const identifiedNote = this.notes.find(note => note._id === id);
      if (identifiedNote != undefined) {
        identifiedNote.content = text;
        identifiedNote.title = title;

        console.log("text addnote", text);
        console.log("identifiedNote.content: ", identifiedNote.content);
        console.log("identifiedNote.title: ", identifiedNote.title);
        console.log("note._id", identifiedNote._id);
        console.log("id: ", id);

        const parsed = JSON.stringify(this.notes);
        localStorage.setItem('notes', parsed);

        // POST request using fetch with error handling
        const requestOptions = {
          method: 'PUT',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({title: identifiedNote.title, content: identifiedNote.content})
        };
        let url = "http://5.135.119.239:3090/notes/" + identifiedNote._id;
        console.log("url  : ", url);
        fetch(url, requestOptions)
            .then(async response => {
              const data = await response.json();

              // check for error response
              if (!response.ok) {
                // get error message from body or default to response status
                const error = (data && data.message) || response.status;
                return Promise.reject(error);
              }

            })
            .catch(error => {
              this.errorMessage = error;
              console.error('There was an error!', error);
            });


      }

    },
    newNote() {
/*      let id = (function b(a) {
            return a ? (a ^ Math.random() * 16 >> a / 4).toString(16) : ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, b)
          }
      )
      ();
      console.log("random", id);*/
      const newNote = {
        title: "",
        content: [],
      }

      // POST request using fetch with error handling
      const requestOptions = {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({title: 'Hello from Strasbourg', content: ['new',]})
      };
      fetch("http://5.135.119.239:3090/notes", requestOptions)
          .then(async response => {
            const data = await response.json();

            // check for error response
            if (!response.ok) {
              // get error message from body or default to response status
              const error = (data && data.message) || response.status;
              return Promise.reject(error);
            }

            newNote.id = data.note_id;
            this.notes.push(newNote);

          })
          .catch(error => {
            this.errorMessage = error;
            console.error('There was an error!', error);
          });


    },
    isSelected(id) {
      console.log("is selected", id);
      const identifiedNote = this.notes.find(note => note._id === id);
      console.log(identifiedNote);

      setTimeout(function () {
        this.updateNote(identifiedNote._id, identifiedNote.content, identifiedNote.title);
      }, 1000);
    }
  }
}
</script>

<style>
.home {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;


}

.home > div {
  margin: 15px;

}

.home > div {
  background: hsl(0, 0%, 30%);


}


</style>
