<template>
    <div>
        <!-- Row is: {{rows}} -->
        <div v-if="loading">Data is loading...</div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div
                    class="col d-flex align-items-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column"
                    >
                    <bookable-list-item v-bind="bookable"></bookable-list-item>
                </div>
                <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem";
export default {
    components: {
        BookableListItem,
    },
    data() {
        return {

            bookables: null,
            loading: false,
            columns: 3

        };
    },
    computed: {
        rows() {
          return this.bookables === null
            ? 0
            : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
          return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
          return this.columns - this.bookablesInRow(row).length;
        }
    },
    // beforeCreate(){
    //     console.log("Before Create");
    // },
    created() {
        //console.log(this.bookable1);
        //console.log(this.bookable2);


        // setTimeout(() => {

        //     this.bookables = [
        //         {
        //             title: "Cheap Villa !!!",
        //             content: "A very Cheap Villa"
        //         },
        //         {
        //             title: "Cheap Villa 2",
        //             content: "A very Cheap Villa 2"
        //         },
        //          {
        //             title: "Cheap Villa 3",
        //             content: "A very Cheap Villa 3"
        //         },
        //          {
        //             title: "Cheap Villa 4",
        //             content: "A very Cheap Villa 4"
        //         },
        //          {
        //             title: "Cheap Villa 5",
        //             content: "A very Cheap Villa 5"
        //         },
        //          {
        //             title: "Cheap Villa 6",
        //             content: "A very Cheap Villa 6"
        //         },
        //          {
        //             title: "Cheap Villa 7",
        //             content: "A very Cheap Villa 7"
        //         },
        //     ]
        //      this.loading = false;
        // }, 2000);

        this.loading = true;

        //Promises
        // const p = new Promise((resolve, reject) => {
        //     console.log(resolve);
        //     console.log(reject);
        //     setTimeout(()=> resolve('Hello'), 3000);
        // //setTimeout(()=> reject('Hello'), 3000);
        // })
        //     .then(result => console.log(`Success ${result}`))
        //     .catch(result => console.log(`Error ${result}`));
        // console.log(p);

        //const request = axios.get("/api/bookables");
        //console.log(request);

        const request = axios.get("/api/bookables").then(response => {
          //this.bookables = response.data;
          this.bookables = response.data.data;
          //this.bookables.push({title: "x", description: "x"});
          this.loading = false;
        });
    },
};
</script>
