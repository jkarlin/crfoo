class TestTestTest {
  async run(urls, data) {
//     return 2;
    
//     return sharedStorage.set("key333", "value333");
    
    if (data.name == "experimentB") {
      return 1;
    } else {
      return 2; 
    }
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
