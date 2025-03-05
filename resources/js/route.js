import routes from "./routes.json";

export default function () {
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();

    if (routes[name] === undefined) {
        console.log('Error');
    } else {
        return '/' +
            routes[name]
                .split('/')
                .map(str => str[0] == "{" ? args.shift() : str)
                .join('/');

    }
}