class SelectURLOperation {
  async run(urls, data) {
    let j = 0;
    for(let i = 0; i < 10000000; i++) {
      j += 1;
    }
    return 1;
  }
}

register('foo', SelectURLOperation);
