let aaa = Object.getOwnPropertyNames(globalThis);
console.log(123);
throw JSON.stringify(aaa, Object.keys(aaa).sort())
