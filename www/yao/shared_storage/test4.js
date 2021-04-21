class TestTestTest {
  async run(urls) {
    await sharedStorage.worklet.append("testkey", "testvalue");
    return 2;    
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
