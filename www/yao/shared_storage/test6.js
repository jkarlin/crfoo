class TestTestTest {
  async run(urls) {
    sharedStorage.append("testkey", "testvalue");
    sharedStorage.get("testkey2");
    return 2;
  }
}

registerURLSelectionOperation("test-operation", TestTestTest);
