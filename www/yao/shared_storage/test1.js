class TestTestTest {
  async run(urls, data) {
//     return 2;
    
    sharedStorage.set("key333", "value333");

    sharedStorage.set("key444");
    
    if (data.name == "experimentB") {
      return 1;
    } else {
      return 2; 
    }
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
