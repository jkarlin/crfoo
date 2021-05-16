class TestTestTest {
  async run(urls) {
    sharedStorage.append("testkey", "testvalue");
    return 2;
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
