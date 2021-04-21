class TestTestTest {
  async run(urls) {
    var key = "testtesttest";
    var values = sharedStorage.read(key);
    console.log(values);
    return 2;    
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
