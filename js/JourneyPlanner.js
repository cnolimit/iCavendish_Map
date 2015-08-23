/**
 * Basic priority queue implementation. If a better priority queue is wanted/needed,
 * this code works with the implementation in google's closure library (https://code.google.com/p/closure-library/).
 * Use goog.require('goog.structs.PriorityQueue'); and new goog.structs.PriorityQueue()
 */
function PriorityQueue () {
  this._nodes = [];

  this.enqueue = function (priority, key) {
    this._nodes.push({key: key, priority: priority });
    this.sort();
  }
  this.dequeue = function () {
    return this._nodes.shift().key;
  }
  this.sort = function () {
    this._nodes.sort(function (a, b) {
      return a.priority - b.priority;
    });
  }
  this.isEmpty = function () {
    return !this._nodes.length;
  }
}



/**
 * Pathfinding starts here
 */
function Route(){
  var INFINITY = 1/0;
  this.vertices = {};//array for verticies

  //
  this.addVertex = function(name, edges){
    this.vertices[name] = edges;
  }

  this.shortestPath = function (start, finish) {
    var nodes = new PriorityQueue(),
        distances = {},
        previous = {},
        path = [],
        smallest, vertex, neighbor, alt;

    for(vertex in this.vertices) {
      if(vertex === start) {
        distances[vertex] = 0;
        nodes.enqueue(0, vertex);
      }
      else {
        distances[vertex] = INFINITY;
        nodes.enqueue(INFINITY, vertex);
      }

      previous[vertex] = null;
    }

    while(!nodes.isEmpty()) {
      smallest = nodes.dequeue();

      if(smallest === finish) {
        path;

        while(previous[smallest]) {
          path.push(smallest);
          smallest = previous[smallest];
        }

        break;
      }

      if(!smallest || distances[smallest] === INFINITY){
        continue;
      }

      for(neighbor in this.vertices[smallest]) {
        alt = distances[smallest] + this.vertices[smallest][neighbor];

        if(alt < distances[neighbor]) {
          distances[neighbor] = alt;
          previous[neighbor] = smallest;

          nodes.enqueue(alt, neighbor);
        }
      }
    }

    return path;
  }
}

var Routes = new Route();

var data = {B: 7, I: 8, H: 6};

Routes.addVertex('A', {B: 7, I: 5, H: 6});

Routes.addVertex('B', {I: 7, C: 2});

Routes.addVertex('C', {B: 2, D: 8});

Routes.addVertex('D', {C: 2, E: 8});

Routes.addVertex('E', {F: 5, D: 1});

Routes.addVertex('F', {E: 6, G: 2});

Routes.addVertex('G', {B: 2});

Routes.addVertex('I', {A: 8});

Routes.addVertex('H', {I: 1, A: 6, Q: 3});

Routes.addVertex('O', {Q: 5, P: 5, N: 7});

Routes.addVertex('Q', {H: 3, O: 5});

Routes.addVertex('P', {O: 5});

Routes.addVertex('N', {O: 7});
