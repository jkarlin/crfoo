// processor.js
class MyProcessor extends AudioWorkletProcessor {
  process(inputs, outputs, parameters) {
    const input = inputs[0];
    const output = outputs[0];

    for (let channel = 0; channel   
 < input.length; ++channel) {
      output[channel].set(input[channel]);   
 // Simple pass-through
    }

    return true;
  }
}

registerProcessor('my-processor', MyProcessor); 
