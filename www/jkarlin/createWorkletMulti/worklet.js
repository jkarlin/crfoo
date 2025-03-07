
class MyWorklet {
  async run(operation, data) {
        console.log("Hello");
  }
}

register('go', MyWorklet);
  
